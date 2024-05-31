<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\JobData;
use App\Models\Outlets;

class UserDataController extends Controller
{
    public function index()
    {
        return redirect(route('admin.users_data'));
    }

    public function show_all_users()
    {
        return User::all();
    }

    public function show_users_table()
    {
        $users = DB::table('users')
            ->leftJoin('job_data', 'users.id', '=', 'job_data.user_id')
            ->select("users.*", "job_data.*", "users.id as usid")
            ->get();

        // echo json_encode($usersData);
        return view('partials.tables.users_table', ['users' => $users]);
    }

    public function add_user(Request $request)
    {
        $user_data = $request->validate([
            "name" => "required|max:255",
            "username" => "required|min:5|max:20|unique:users",
            "email" => "required|email:dns",
            "password" => "required|min:6|max:16",
            "role" => "required"
        ]);

        DB::table('users')->insertGetId([
            'name' => $user_data['name'],
            'username' => $user_data['username'],
            'email' => $user_data['email'],
            'password' => bcrypt($user_data['password']),
            'role' => $user_data['role'],
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
        ]);

        return response()->json([
            "message" => "Data " . $user_data["name"] . " berhasil disimpan",
            "status" => "success",
            "data" => $user_data
        ]);
    }

    public function show_user(Request $request)
    {
        $id = $request->id;

        $detailUser = DB::table('users')
            ->leftJoin('job_data', 'users.id', '=', 'job_data.user_id')
            ->select("users.*", "job_data.*", "users.id as usid")
            ->where("users.id", "=", $id)
            ->get();
        // return json_encode($detailUser);
        return response()->json([
            "message" => "berhasil mengambil data",
            "status" => "success",
            "data" => $detailUser
        ]);
    }

    public function edit_user(Request $request)
    {
        // define id
        $id = $request->input('id');
        // validate all inputs
        $newUserData = $request->validate([
            "id" => [
                "required", Rule::exists('users', 'id')->where(function ($query) use ($id) {
                    return $query->where('id', $id);
                })
            ],
            "name" => "required|max:255",
            "username" => [
                "required", "max:20",
                Rule::unique('users')->ignore($id)
            ],

            "job_id" => "",
            "outlet_id" => "",
            "photo" => "image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        if ($request->has('role')) {
            $newUserData += $request->validate([
                "role" => "required",
            ]);
        }


        // validate password if no empty
        if ($request->has('password') && !empty($request->password)) {
            $newUserData += $request->validate([
                "password" => "min:6|max:16",
            ]);
        }
        // store photo file if not empty
        if ($request->hasFile('photo')) {
            // change photo name
            $photoName = $newUserData['username']  . round(microtime(true)) . "." . $request->photo->extension();
            $newUserData['photo'] = $photoName;
            // storing photo file
            $path = $request->file('photo')->storeAs('images/users', $photoName);
        }
        // Update Database

        User::find($request->id)->update($newUserData);
        DB::table('job_data')
            ->updateOrInsert(

                ['user_id' => $id],
                [
                    'job_id' => intval($newUserData['job_id']),
                    'outlet_id' => intval($newUserData['outlet_id'])
                ]
            );

        return response()->json([
            "message" => "Data " . $newUserData["name"] . " berhasil diubah",
            "status" => "success",
            "data" => $newUserData
        ]);
    }

    public function delete_user(Request $request)
    {
        $id = $request->input("id");
        // $id = 3;
        $user = User::find($id);
        if ($user->photo) {
            Storage::delete("images/users/" . $user->photo);
        }
        $user->delete();

        // return "data berhasil dihapus";
        return response()->json([
            "message" => "Data " . $user["name"] . " berhasil dihapus",
            "status" => "success"
        ]);
    }
}
