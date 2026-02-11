@extends('backend.layouts.master')
@section('posi_menu-open','menu-open')
@section('posi_active','active')
@section('title','Add Position')
@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Position</h1>
          </div><div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">
                <a href="{{url('/position')}}"><i class="fas fa-arrow-circle-left"></i> back</a>
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
                  <h3 class="card-header-title">Create New Position</h3>
              </div>

              <form action="{{ url('/position/store') }}" method="POST">
                  @csrf
                  <div class="card-body">
                      <div class="row">
                          <div class="form-group col-md-6">
                              <label for="position_title">Position Title</label>
                              <input type="text" name="position_title" class="form-control @error('position_title') is-invalid @enderror" id="position_title" value="{{ old('position_title') }}" placeholder="Enter Position Title">
                              @error('position_title')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>

                          <div class="form-group col-md-6">
                              <label for="level">Level</label>
                              <input type="text" name="level" class="form-control @error('level') is-invalid @enderror" id="level" value="{{ old('level') }}" placeholder="e.g. Junior, Senior">
                              @error('level')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>

                          <div class="form-group col-md-6">
                              <label for="department_id">Department</label>
                              <select name="department_id" class="form-control @error('department_id') is-invalid @enderror" id="department_id">
                                  <option value="">Select Department</option>
                                  @foreach($departments as $dept)
                                      <option value="{{ $dept->department_id }}" {{ old('department_id') == $dept->department_id ? 'selected' : '' }}>{{ $dept->department_name }}</option>
                                  @endforeach
                              </select>
                              @error('department_id')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>

                          <div class="form-group col-md-6">
                              <label for="is_managerial">Is Managerial Position?</label>
                              <select name="is_managerial" class="form-control" id="is_managerial">
                                  <option value="0" {{ old('is_managerial') == '0' ? 'selected' : '' }}>No</option>
                                  <option value="1" {{ old('is_managerial') == '1' ? 'selected' : '' }}>Yes</option>
                              </select>
                          </div>

                          <div class="form-group col-md-12">
                              <label for="description">Description</label>
                              <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Enter Description">{{ old('description') }}</textarea>
                              @error('description')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>
                  </div>
                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Save Position</button>
                      <a href="{{ url('/position') }}" class="btn btn-default float-right">Cancel</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div></section>
  </div>
@endsection