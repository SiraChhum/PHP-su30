<?php

namespace App\Http\Controllers\backend;

use App\Models\Employees;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController
{
    public function index()
    {
        $employees = Employees::with('department', 'position')->latest()->paginate(5);
        return view('backend.employee.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('backend.employee.create', compact('departments', 'positions'));
    }

    public function show($id)
    {
        $employee = Employees::with('department', 'position')->find($id);
        if (! $employee) {
            Log::warning('Requested employee not found', ['id' => $id]);
            return redirect('/employee')->with('error', 'Employee not found.');
        }
        return view('backend.employee.view', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employees::findOrFail($id);
        $departments = Department::all();
        $positions = Position::all();
        return view('backend.employee.edit', compact('employee', 'departments', 'positions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date',
            'national_id' => 'required|string|unique:employees,national_id,'.$id.',employee_id|max:50',
            'email' => 'required|email|unique:employees,email,'.$id.',employee_id|max:255',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'hire_date' => 'required|date',
            'department_id' => 'required|exists:departments,department_id',
            'position_id' => 'required|exists:positions,position_id',
            'employee_type' => 'required|in:full_time,part_time,contract',
            'status' => 'required|in:active,inactive,terminated',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        // Log upload debug info
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            Log::info('Profile upload detected (update)', [
                'originalName' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'mime' => $file->getClientMimeType(),
            ]);
        } else {
            Log::info('No profile upload detected (update)');
        }

        $employee = Employees::findOrFail($id);
        $employee->full_name = $request->full_name;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->national_id = $request->national_id;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->address = $request->address;
        $employee->hire_date = $request->hire_date;
        $employee->department_id = $request->department_id;
        $employee->position_id = $request->position_id;
        $employee->employee_type = $request->employee_type;
        $employee->status = $request->status;

        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($employee->profile_photo && file_exists(storage_path('app/public/' . $employee->profile_photo))) {
                unlink(storage_path('app/public/' . $employee->profile_photo));
            }
            // Store new photo
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $employee->profile_photo = $path;
        }

        $employee->save();

        return redirect('/employee')->with('success', 'Employee updated successfully!');
    }

    public function delete($id)
    {
        $employee = Employees::with('department', 'position')->findOrFail($id);
        return view('backend.employee.delete', compact('employee'));
    }

    public function destroy($id)
    {
        $employee = Employees::findOrFail($id);

        // Delete profile photo if exists
        if ($employee->profile_photo && file_exists(storage_path('app/public/' . $employee->profile_photo))) {
            unlink(storage_path('app/public/' . $employee->profile_photo));
        }

        $employee->delete();

        return redirect('/employee')->with('success', 'Employee deleted successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date',
            'national_id' => 'required|string|unique:employees,national_id|max:50',
            'email' => 'required|email|unique:employees,email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'hire_date' => 'required|date',
            'department_id' => 'required|exists:departments,department_id',
            'position_id' => 'required|exists:positions,position_id',
            'employee_type' => 'required|in:full_time,part_time,contract',
            'status' => 'required|in:active,inactive,terminated',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        // Log upload debug info
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            Log::info('Profile upload detected (store)', [
                'originalName' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'mime' => $file->getClientMimeType(),
            ]);
        } else {
            Log::info('No profile upload detected (store)');
        }

        $employee = new Employees();
        $employee->full_name = $request->full_name;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->national_id = $request->national_id;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->address = $request->address;
        $employee->hire_date = $request->hire_date;
        $employee->department_id = $request->department_id;
        $employee->position_id = $request->position_id;
        $employee->employee_type = $request->employee_type;
        $employee->status = $request->status;

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $employee->profile_photo = $path;
        }

        $employee->save();

        return redirect('/employee')->with('success', 'Employee created successfully!');
    }
}
