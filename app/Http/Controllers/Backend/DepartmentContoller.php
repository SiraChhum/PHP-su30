<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Department;

class DepartmentContoller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = DB::table('departments')->get();
        return view('backend.settings.departments.index',['departments'=>$departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.settings.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'department_code' => 'required|unique:departments,department_code',
        'department_name' => 'required|string|max:255',
        'department_description' => 'nullable|string',
        'department_status' => 'required',
    ]);

    Department::create([
        'department_code' => $request->department_code,
        'department_name' => $request->department_name,
        'department_description' => $request->department_description,
        'department_status' => $request->department_status,
    ]);

    return redirect('/department')->with('success', 'Department created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
