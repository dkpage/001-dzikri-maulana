<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Login"
        ];
        return view("pages.auth.login", $data);
    }

    public function authenticate(Request $request)
    {
        $authenticated = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        $user = User::where("username", $authenticated['username'])->first();

        if ($user == null) {
            return back()->withErrors([
                'error' => 'Kredensial tidak ditemukan!',
            ]);
        }

        if (!Hash::check($authenticated['password'], $user->password)) {
            return back()->withErrors([
                'error' => 'Kredensial tidak ditemukan!',
            ]);
        }

        $userInit = DB::table("users")
            ->join("roles", "roles.id", "=", "users.role")
            ->where("users.id", "=", $user->id)
            ->select("roles.access as access_type")
            ->get();
        $accessType = $userInit[0]->access_type;


        $request->session()->regenerate();
        $request->session()->put("isLogged", true);
        $request->session()->put("userId", $user->id);
        $request->session()->put("role", $accessType);

        if ($accessType == "admin") {
            return redirect()->route('admin.dashboard')->with("success", "Berhasil Login sebagai Admin");
        } else if ($accessType == "user") {
            return redirect()->route('user.home')->with("success", "Login Sukses!");
        } else {
            session()->forget("isLogged");
            session()->forget("userId");
            session()->forget("role");
            return back()->withErrors([
                'error' => 'Anda tidak memiliki akses, silahkan hubungi admin aplikasi',
            ]);
        }
    }

    public function logout()
    {
        session()->forget("isLogged");
        session()->forget("userId");
        session()->forget("role");

        return redirect()->route("auth.login")->with("info", "Anda sudah Logout");
    }
}
