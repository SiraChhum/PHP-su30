@extends('backend.layouts.master')
@section('dept_menu-open','menu-open')
@section('dept_active','active')
@section('title','View Department')

@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Department Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="{{url('/department')}}" class="btn btn-sm btn-secondary">
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
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Viewing Department ID: #{{ $department->department_id }}</h3>
              </div>
              
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th style="width: 30%">Department Code</th>
                      <td><strong>{{ $department->department_code }}</strong></td>
                    </tr>
                    <tr>
                      <th>Department Name</th>
                      <td>{{ $department->department_name }}</td>
                    </tr>
                    <tr>
                      <th>Description</th>
                      <td>{{ $department->description ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                      <th>Status</th>
                      <td>
                        @if($department->status == 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <th>Created At</th>
                      <td>{{ $department->created_at }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              <div class="card-footer">
                <a href="{{ url('/department/edit/'.$department->department_id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ url('/department') }}" class="btn btn-default float-right">Close</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection