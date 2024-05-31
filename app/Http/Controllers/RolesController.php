<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Roles::all();

        return response()->json($roles);
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
        $role_data = $request->validate([
            "role_name" => "required",
            "access" => "required"
        ]);

        Roles::create($role_data);

        return response()->json([
            "message" => "Data " . $role_data["role_name"] . " berhasil disimpan",
            "status" => "success",
            "data" => $role_data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Roles $roles)
    {
        return Roles::find($roles);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Roles $roles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roles $roles)
    {
        //
    }
}
