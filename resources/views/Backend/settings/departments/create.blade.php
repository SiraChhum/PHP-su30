@extends('backend.layouts.master')
@section('title','Add Department')
@section('dpt_menu-open','menu-open')

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
              <a href="{{url('/department')}}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left"></i>Back</a>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Fill Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form action="{{ url('/department') }}" method="POST">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>DepartmentCode</label>
                    <input type="text" name="department_code" class="form-control" id="department_code" placeholder="Enter Code ....">
                  </div>
                  <div class="form-group">
                    <label>DepartmentName</label>
                    <input type="text" name="department_name" class="form-control" id="department_name" placeholder="Enter Name ....">
                  </div>
                  <div class="form-group">
                    <label>Dep-Description</label>
                    <textarea name="department_description" row="2" class="form-control" id="department_description" placeholder="Enter Description ...."></textarea>
                  </div>

                  <div class="form-group">
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="department_status" value="active" checked>
                          <label class="form-check-label">Active</label>
                    </div>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="department_status" value="inactive">
                          <label class="form-check-label">Inactive</label>
                    </div>
                    </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add New Department</button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
@endsection







