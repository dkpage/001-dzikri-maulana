<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $retportData = DB::table('reports')
            ->join('users', 'reports.user_id', '=', 'users.id')
            ->join('outlets', 'reports.outlet_id', '=', 'outlets.id')
            ->select('reports.*', 'users.name as user_name', 'outlets.outlet_name')
            ->get();

        $data = [
            // "reports" => Reports::all()
            'reports' => $retportData
        ];

        return view("partials.tables.reports_table", $data);
        // return ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reportData = $request->validate([
            "user_id" => "integer",
            "report_title" => "required|string",
            "outlet_id" => "required",
            "report_desc" => "required|string",
            "report_file" => "required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);

        $fileName = $reportData['user_id'] . "-" . $reportData['outlet_id'] . "-" . round(microtime(true)) . "." . $request->report_file->extension();
        $reportData['report_file'] = $fileName;
        // storing photo file
        $request->file('report_file')->storeAs('images/reports', $fileName);

        // then save the data in database
        DB::table("reports")->upsert(
            [
                "user_id" => $reportData["user_id"],
                "document_number" => "L-" . round(microtime(true)),
                "report_title" => $reportData["report_title"],
                "outlet_id" => $reportData["outlet_id"],
                "report_desc" => $reportData["report_desc"],
                "report_file" => $reportData["report_file"],
            ],
            ['document_number'],
            [
                'report_title', 'outlet_id', 'report_desc', 'report_file'
            ]
        );
        return response()->json([
            "success" => true,
            "message" => "Data Berhasil disimpan",
            "data" => $reportData
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reports $reports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reports $reports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reports $reports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input("id");
        // $id = 3;
        $report = Reports::find($id);
        if ($report->report_file) {
            Storage::delete("images/reports/" . $report->photo);
        }
        $report->delete();

        // return "data berhasil dihapus";
        return response()->json([
            "message" => "Data " . $report->name . " berhasil dihapus",
            "status" => "success"
        ]);
    }
}
