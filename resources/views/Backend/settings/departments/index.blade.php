@extends('backend.layouts.master')
@section('title','Department')
@section('dpt_menu-open','menu-open')
@section('dpt_active','active')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Department</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Department</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fa-solid fa-building-user"></i>DepartmentList</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>DepartmentCode</th>
                      <th>DepartmentName</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($departments->isEmpty())
                      <tr>
                        <td colspan="6" class="text-danger text-center">No Departments Found!</td>
                      </tr>
                    @else
                        
                        @foreach($departments as $key => $value)
                          <tr>
                            <td>{{++$key}}</td>
                            <td>{{$value->department_code}}</td>
                            <td>{{$value->department_name}}</td>
                            <td>{{$value->department_description}}</td>
                            <td>
                                <span class="badge {{ $value->department_status == 'Active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $value->department_status }}
                                </span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
@endsection







