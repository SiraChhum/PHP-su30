@extends('backend.layouts.master')
@section('emp_menu-open','menu-open')
@section('emp_active','active')
@section('title','View Employee')

@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employee Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="{{url('/employee')}}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> back
                </a>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card card-info">
              <div class="card-header d-flex align-items-center">
                <div class="me-3">
                    <img src="{{ $employee->profile_photo ? asset('storage/' . $employee->profile_photo) : asset('dist/img/avatar5.png') }}" alt="Profile" class="img-circle elevation-2" style="width:80px;height:80px;object-fit:cover;">
                </div>
                <h3 class="card-title">Viewing Employee: <strong>{{ $employee->full_name }}</strong></h3>
              </div>
              
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th style="width: 30%">Full Name</th>
                      <td>{{ $employee->full_name }}</td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td>{{ $employee->email }}</td>
                    </tr>
                    <tr>
                      <th>Phone</th>
                      <td>{{ $employee->phone_number ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                      <th>National ID</th>
                      <td>{{ $employee->national_id }}</td>
                    </tr>
                    <tr>
                      <th>Gender</th>
                      <td>{{ ucfirst($employee->gender) }}</td>
                    </tr>
                    <tr>
                      <th>DOB</th>
                      <td>{{ $employee->dob }}</td>
                    </tr>
                    <tr>
                      <th>Hire Date</th>
                      <td>{{ $employee->hire_date }}</td>
                    </tr>
                    <tr>
                      <th>Department</th>
                      <td>{{ $employee->department->department_name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                      <th>Position</th>
                      <td>{{ $employee->position->position_title ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                      <th>Type</th>
                      <td>{{ ucfirst(str_replace('_',' ', $employee->employee_type)) }}</td>
                    </tr>
                    <tr>
                      <th>Status</th>
                      <td>{{ ucfirst($employee->status) }}</td>
                    </tr>
                    <tr>
                      <th>Address</th>
                      <td>{{ $employee->address ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                      <th>Created At</th>
                      <td>{{ $employee->created_at }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              <div class="card-footer">
                <a href="{{ url('/employee/edit/'.$employee->employee_id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ url('/employee') }}" class="btn btn-default float-right">Close</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection