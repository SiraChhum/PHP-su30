@extends('backend.layouts.master')
@section('posi_menu-open','menu-open')
@section('posi_active','active')
@section('title','Positions')
@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Positions</h1>
          </div><div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">
                <a href="{{url('/position/create')}}"><i class="fas fa-plus-circle"></i> Add Position</a>
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
                <h3 class="card-title">Position List Table</h3>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Position Title</th>
                        <th>Description</th>
                        <th>Level</th>
                        <th>Department</th>
                        <th>Managerial</th>
                        <th style="width: 200px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if ($positions->isEmpty())
                          <tr>
                              <td colspan="7" class="py-5 text-center">
                                  <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                                  <p class="text-danger fw-bold">No positions found.</p>
                              </td>
                          </tr>
                      @else
                          @foreach ($positions as $key => $value)
                              <tr>
                                  {{-- Dynamic Indexing for Pagination --}}
                                  <td class="align-middle text-center">
                                    {{ ($positions->currentPage() - 1) * $positions->perPage() + $loop->iteration }}
                                  </td>
                                  <td class="align-middle"><strong>{{ $value->position_title }}</strong></td>
                                  <td class="align-middle">{{ $value->description ?? 'N/A' }}</td>
                                  <td class="align-middle">{{ $value->level ?? 'N/A' }}</td>
                                  <td class="align-middle">{{ $value->department->department_name ?? 'N/A' }}</td>
                                  <td class="align-middle">
                                      @if($value->is_managerial)
                                          <span class="badge bg-success">Yes</span>
                                      @else
                                          <span class="badge bg-secondary">No</span>
                                      @endif
                                  </td>
                                  <td class="align-middle">
                                      <div class="btn-group" role="group">
                                          {{-- View Button --}}
                                          <a href="{{ url('/position/show/'.$value->position_id) }}" class="btn btn-outline-info">
                                              <i class="fas fa-eye"></i>
                                          </a>

                                          {{-- Edit Button --}}
                                            <a href="{{ url('/position/edit/'.$value->position_id) }}" class="btn btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                          {{-- Delete Button with Form --}}
                                          <a href="{{ url('/position/delete/'.$value->position_id) }}" class="btn btn-outline-danger">
                                              <i class="fas fa-trash-alt"></i>
                                          </a>
                                      </div>
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
                    {{ $positions->links('pagination::bootstrap-4') }}
                </div>
              </div>
            </div>
            </div>
        </div>
      </div></section>
  </div>
@endsection
