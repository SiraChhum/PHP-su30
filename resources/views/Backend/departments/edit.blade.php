@extends('backend.layouts.master')
@section('title','Edit Department')
@section('main-content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Edit Department</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ url('/department/update/'.$department->department_id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Department Code</label>
                                <input type="text" name="dept_code" class="form-control @error('dept_code') is-invalid @enderror" value="{{ old('dept_code', $department->department_code) }}">
                                @error('dept_code') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Department Name</label>
                                <input type="text" name="dept_name" class="form-control @error('dept_name') is-invalid @enderror" value="{{ old('dept_name', $department->department_name) }}">
                                @error('dept_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ old('description', $department->description) }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $department->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $department->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ url('/department') }}" class="btn btn-default float-right">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection