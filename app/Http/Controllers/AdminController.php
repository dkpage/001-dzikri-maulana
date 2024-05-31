<?php

namespace App\Http\Controllers;

use App\Models\JobPositions;
use App\Models\Roles;
use App\Models\User;
use App\Models\Reports;
use App\Models\Outlets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            "user" => GetDataLogin::get(),
        ];
        return view("pages.admin.dashboard", $data);
    }

    public function users_data()
    {
        $data = [
            'title' => 'Data Pengguna',
            "user" => GetDataLogin::get(),
            'usersData' => User::all(),
            'roleData' => Roles::all(),
            'outletsData' => Outlets::all(),
            'jobPositionData' => JobPositions::all()
        ];
        return view("pages.admin.users_data", $data);
    }
    public function outlets_data()
    {
        $data = [
            'title' => 'Data Cabang',
            "user" => GetDataLogin::get(),
        ];
        return view("pages.admin.outlets_data", $data);
    }
    public function reports_data()
    {
        $data = [
            'title' => 'Data Laporan',
            "user" => GetDataLogin::get(),

        ];
        return view("pages.admin.report_data", $data);
    }
    public function report_detail($id)
    {
        $reportData = DB::table('reports')
            ->where('reports.id', '=', $id)
            ->join('users', 'reports.user_id', '=', 'users.id')
            ->join('outlets', 'reports.outlet_id', '=', 'outlets.id')
            ->select('reports.*', 'users.name as user_name', 'outlets.outlet_name')
            ->first();

        $data = [
            'title' => 'Detail Laporan',
            "user" => GetDataLogin::get(),
            'report' => $reportData
        ];
        return view("pages.admin.report_detail", $data);
    }

    // public function add_user()
    // {
    //     $data = [
    //         'title' => 'Tambah Pengguna'
    //     ];
    //     return view("pages.admin.add_user", $data);
    // }
    // public function edit_user(Request $id)
    // {
    //     $data = [
    //         'title' => 'Edit Pengguna',
    //         'user_data' => User::find($id)
    //     ];
    //     return view("pages.admin.edit_user", $data);
    // }
}
