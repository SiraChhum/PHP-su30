@extends('backend.layouts.master')
@section('posi_menu-open','menu-open')
@section('posi_active','active')
@section('title','View Position')

@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Position Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="{{url('/position')}}" class="btn btn-sm btn-secondary">
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
                <h3 class="card-title">Viewing Position ID: #{{ $position->position_id }}</h3>
              </div>
              
              <div class="card-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th style="width: 30%">Position Title</th>
                      <td><strong>{{ $position->position_title }}</strong></td>
                    </tr>
                    <tr>
                      <th>Description</th>
                      <td>{{ $position->description ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                      <th>Level</th>
                      <td>{{ $position->level ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                      <th>Department</th>
                      <td>{{ $position->department->department_name ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                      <th>Managerial Position</th>
                      <td>
                        @if($position->is_managerial)
                            <span class="badge bg-success">Yes</span>
                        @else
                            <span class="badge bg-secondary">No</span>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <th>Created At</th>
                      <td>{{ $position->created_at }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              <div class="card-footer">
                <a href="{{ url('/position/edit/'.$position->position_id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ url('/position') }}" class="btn btn-default float-right">Close</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection