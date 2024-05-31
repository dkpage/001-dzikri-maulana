<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetDataLogin extends Controller
{
    public static function get()
    {
        $id = session()->get('userId');

        $userLogin = DB::table('users')
            ->leftJoin('job_data', 'users.id', '=', 'job_data.user_id')
            ->select("users.*", "job_data.*", "users.id as usid")
            ->where("users.id", "=", $id)
            ->first();

        return $userLogin;
    }
}
