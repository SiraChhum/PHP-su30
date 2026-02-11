<?php

namespace App\Http\Controllers\backend;

use App\Models\Position;
use App\Models\Department;
use Illuminate\Http\Request;

class PositionController
{
    public function index()
    {
        $positions = Position::with('department')->latest()->paginate(5);
        return view('backend.postitions.index', compact('positions'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('backend.postitions.create', compact('departments'));
    }

    public function show($id)
    {
        $position = Position::with('department')->findOrFail($id);
        return view('backend.postitions.view', compact('position'));
    }

    public function edit($id)
    {
        $position = Position::findOrFail($id);
        $departments = Department::all();
        return view('backend.postitions.edit', compact('position', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'position_title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'level' => 'nullable|string|max:50',
            'department_id' => 'required|exists:departments,department_id',
            'is_managerial' => 'boolean',
        ]);

        $position = Position::findOrFail($id);
        $position->position_title = $request->position_title;
        $position->description = $request->description;
        $position->level = $request->level;
        $position->department_id = $request->department_id;
        $position->is_managerial = $request->is_managerial ?? false;
        $position->save();

        return redirect('/position')->with('success', 'Position updated successfully!');
    }

    public function delete($id)
    {
        $position = Position::with('department')->findOrFail($id);
        return view('backend.postitions.delete', compact('position'));
    }

    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect('/position')->with('success', 'Position deleted successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'position_title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'level' => 'nullable|string|max:50',
            'department_id' => 'required|exists:departments,department_id',
            'is_managerial' => 'boolean',
        ]);

        $position = new Position();
        $position->position_title = $request->position_title;
        $position->description = $request->description;
        $position->level = $request->level;
        $position->department_id = $request->department_id;
        $position->is_managerial = $request->is_managerial ?? false;
        $position->save();

        return redirect('/position')->with('success', 'Position created successfully!');
    }
}