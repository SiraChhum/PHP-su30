@extends('backend.layouts.master')
@section('emp_menu-open','menu-open')
@section('emp_active','active')
@section('title','Confirm Delete')
@section('main-content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Delete Employee</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Confirm Permanent Deletion</h3>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <i class="fas fa-exclamation-triangle fa-4x text-warning"></i>
                            </div>
                            <p>Are you sure you want to delete the following employee?</p>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $employee->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $employee->email }}</td>
                                </tr>
                                <tr>
                                    <th>Department</th>
                                    <td>{{ $employee->department->department_name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Position</th>
                                    <td>{{ $employee->position->position_title ?? 'N/A' }}</td>
                                </tr>
                            </table>
                            <p class="text-danger"><strong>Note:</strong> This action cannot be undone.</p>
                        </div>
                        <div class="card-footer">
                            {{-- This form performs the actual DELETE --}}
                            <form action="{{ url('/employee/destroy/'.$employee->employee_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Yes, Delete Permanently</button>
                                <a href="{{ url('/employee') }}" class="btn btn-secondary float-right">No, Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection