@extends('backend.layouts.master')
@section('dept_menu-open','menu-open')
@section('dept_active','active')
{{-- @section('posi_menu-open','menu-open')
@section('posi_active','active') --}}
@section('title','Departments')
@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Departments</h1>
          </div><div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">
                <a href="{{url('/department/create')}}"><i class="fas fa-plus-circle"></i> Add Department</a>
              </li>
            </ol>
          </div></div></div></div>
    <section class="content">
      <div class="container-fluid">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Message --}}
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Department List Table</h3>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                         <th>#</th>
                      <th>DepartmentCode</th>
                      <th>DepartmentName</th>
                      <th>Description</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if ($departments->isEmpty())
                          <tr>
                              <td colspan="6" class="py-5 text-center">
                                  <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                                  <p class="text-danger fw-bold">No departments found.</p>
                              </td>
                          </tr>
                      @else
                          @foreach ($departments as $key => $value)
                              <tr>
                                  {{-- Dynamic Indexing for Pagination --}}
                                  <td class="align-middle text-center">
                                    {{ ($departments->currentPage() - 1) * $departments->perPage() + $loop->iteration }}
                                  </td>
                                    <td>{{$value->department_code}}</td>
                                    <td>{{$value->department_name}}</td>
                                    <td class="col-md-4">{{$value->department_description}}</td>
                                  <td>
                                      <buttom type="buttom" class="btn btn-block btn-{{$value->department_status == 'active' ? 'success' : 'danger' }} btn-sm">
                                        {{ucfirst($value->department_status)}}
                                        </buttom>
                                  </td>
                                   <td class="text-center">
                                        <a href="{{ url('/department/show/'.$value->department_id) }}" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                                        <a href="{{ url('/department/edit/'.$value->department_id) }}" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('/department/delete/'.$value->department_id) }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                              </tr>
                          @endforeach
                      @endif
                  </tbody>
                </table>
              </div>
              <div class="card-footer clearfix">
                <div class="float-right">
                    {{-- Laravel Pagination Links --}}
                    {{ $departments->links('pagination::bootstrap-4') }}
                </div>
              </div>
            </div>
            </div>
        </div>
      </div></section>
  </div>
@endsection
