<?php

namespace App\Http\Controllers\backend;

use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DepartmentController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $departments = DB::table('departments')->get();
       $departments = Department::latest()->paginate(5); 
        return view('backend.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.departments.create');
    }

    /**
     * Store a newly created resource in storage.
        */
    public function store(Request $request)
    {
        $request->validate([
            'dept_code' => 'required|unique:departments,department_code|max:50',
            'dept_name' => 'required|string|max:255',
            'status'    => 'required'
        ]);

        $department = new Department();
        $department->department_code = $request->dept_code; 
        $department->department_name = $request->dept_name;
        $department->description     = $request->description;
        $department->status          = ($request->status == '1') ? 'active' : 'inactive';
        $department->save();

        return redirect('/department')->with('success', 'Department created successfully!');
    }

    /**
     * Display the specified resource (VIEW).
     */
    public function show(string $id)
    {
        $department = Department::findOrFail($id);
        return view('backend.departments.view', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $department = Department::findOrFail($id);
            return view('backend.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
    {
        // Validate to prevent "Data too long" error by adding max:50
        $request->validate([
            'dept_code' => 'required|max:50|unique:departments,department_code,'.$id.',department_id',
            'dept_name' => 'required|string|max:255',
            'status'    => 'required'
        ]);

        $department = Department::findOrFail($id);
        $department->department_code = $request->dept_code; 
        $department->department_name = $request->dept_name;
        $department->description     = $request->description;
        $department->status          = ($request->status == '1') ? 'active' : 'inactive';
        $department->save();

        return redirect('/department')->with('success', 'Department updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $department = Department::findOrFail($id);
        return view('backend.departments.delete', compact('department'));
    }

    // Perform the actual deletion
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect('/department')->with('success', 'Department deleted successfully!');
    }
}
