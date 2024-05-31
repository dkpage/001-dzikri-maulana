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
use App\Models\Roles;
use App\Models\JobPositions;

class PortalController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Beranda",
            "user" => GetDataLogin::get(),
        ];
        return view("pages.user.home", $data);
    }

    public function profile()
    {
        $data = [
            "title" => "Profil",
            "user" => GetDataLogin::get(),
            'roleData' => Roles::all(),
            'outletsData' => Outlets::all(),
            'jobPositionData' => JobPositions::all()
        ];
        return view("pages.user.profile", $data);
    }
    public function report_form()
    {
        $dataOutlet = Outlets::all();

        $data = [
            "title" => "Form Laporan",
            "user" => GetDataLogin::get(),
            "outlData" => $dataOutlet
        ];
        return view("pages.user.report_form", $data);
    }
    public function report_data()
    {
        $user_id = 2;
        $retportData = DB::table('reports')
            ->join('users', 'reports.user_id', '=', 'users.id')
            ->join('outlets', 'reports.outlet_id', '=', 'outlets.id')
            ->where("reports.user_id", 3)
            ->select('reports.*',  'outlets.outlet_name')
            ->get();

        $data = [
            "title" => "Data Laporan",
            "user" => GetDataLogin::get(),
            'reports' => $retportData
        ];
        return view("pages.user.reports", $data);
    }

    public function report_detail($id)
    {
        // $id = $request->input('id');
        $dataOutlet = Outlets::all();
        $reportData = DB::table('reports')
            ->where('reports.document_number', $id)
            ->join('users', 'reports.user_id', '=', 'users.id')
            ->join('outlets', 'reports.outlet_id', '=', 'outlets.id')
            ->select('reports.*', 'users.name as user_name', 'outlets.outlet_name')
            ->first();

        $data = [
            'title' => 'Detail Laporan',
            "user" => GetDataLogin::get(),
            'report' => $reportData,
            "outlData" => $dataOutlet
        ];
        return view("pages.user.report_form", $data);
    }

    // public function edit_report($id)
    // {
    //     $reportData = DB::table('reports')
    //         ->where('reports.document_number', $id)
    //         ->join('users', 'reports.user_id', '=', 'users.id')
    //         ->join('outlets', 'reports.outlet_id', '=', 'outlets.id')
    //         ->select('reports.*', 'users.name as user_name', 'outlets.outlet_name')
    //         ->first();

    //     $data = [
    //         'title' => 'Detail Laporan',
    //         "user" => GetDataLogin::get(),
    //         'report' => $reportData
    //     ];
    //     return view("pages.user.report_detail", $data);
    // }
}
