@extends('backend.layouts.master')
@section('dept_menu-open','menu-open')
@section('dept_active','active')
@section('title','ADD-Departments')
@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ADD Departments</h1>
          </div><div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">
                <a href="{{url('/department')}}"><i class="fas fa-arrow-circle-left"></i> back</a>
              </li> 
            </ol>
          </div></div></div></div>

    <section class="content">
      <div class="container-fluid">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-header-title">Create New Department</h3>
              </div>
              
              <form action="{{ url('/department/store') }}" method="POST">
                  @csrf
                  <div class="card-body">
                      <div class="row">
                          <div class="form-group col-md-6">
                              <label for="dept_code">Department Code</label>
                              <input type="text" name="dept_code" class="form-control @error('dept_code') is-invalid @enderror" id="dept_code" value="{{ old('dept_code') }}" placeholder="e.g. DEPT-001">
                              @error('dept_code')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>

                          <div class="form-group col-md-6">
                              <label for="dept_name">Department Name</label>
                              <input type="text" name="dept_name" class="form-control @error('dept_name') is-invalid @enderror" id="dept_name" value="{{ old('dept_name') }}" placeholder="Enter Name">
                              @error('dept_name')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>

                          <div class="form-group col-md-12">
                              <label for="description">Description</label>
                              <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Enter Description">{{ old('description') }}</textarea>
                              @error('description')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>

                          <div class="form-group col-md-6">
                              <label for="status">Status</label>
                              <select name="status" class="form-control" id="status">
                                  <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                  <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Save Department</button>
                      <a href="{{ url('/department') }}" class="btn btn-default float-right">Cancel</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div></section>
  </div>
@endsection