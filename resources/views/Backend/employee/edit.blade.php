@extends('backend.layouts.master')
@section('emp_menu-open','menu-open')
@section('emp_active','active')
@section('title','Add/Edit Employee')

@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/employee')}}">Home</a></li>
                        <li class="breadcrumb-item active">Employee</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="mb-3">
                <a href="{{ url('/employee') }}" class="btn btn-light border"><i class="fas fa-list"></i> Employee List</a>
                <button class="btn btn-primary"><i class="fas fa-user-plus"></i> Add Employee</button>
            </div>

            <form action="{{ isset($employee) ? url('/employee/update/'.$employee->employee_id) : url('/employee/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($employee)
                    @method('PUT')
                @endisset
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #007bff;">
                        <h3 class="card-title"><i class="fas fa-user-plus"></i> {{ isset($employee) ? 'Edit Employee' : 'Add New Employee' }}</h3>
                    </div>

                    <div class="card-body">
                        {{-- Photo Upload Section --}}
                        <div class="text-center mb-4">
                            <label for="profile_photo" class="d-block">Profile Photo</label>
                            <div class="image-preview-container mb-2">
                                <img id="preview"
                                     src="{{ (isset($employee) && $employee->profile_photo) ? asset('storage/' . $employee->profile_photo) : asset('dist/img/avatar5.png') }}"
                                     alt="Profile Photo"
                                     class="img-circle elevation-2"
                                     style="width: 120px; height: 120px; object-fit: cover; border: 2px solid #adb5bd;">
                            </div>
                            <div class="custom-file" style="max-width: 250px; margin: 0 auto;">
                                <input type="file" name="profile_photo" class="custom-file-input" id="profile_photo" accept="image/*" onchange="previewImage(this)">
                                <label class="custom-file-label" for="profile_photo">Choose file</label>
                            </div>
                            <small class="text-muted d-block mt-1">Recommended: Square image, max 20MB</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Full Name</label>
                                <input type="text" name="full_name" class="form-control" placeholder="Full name" value="{{ $employee->full_name ?? '' }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $employee->email ?? '' }}">
                            </div>

                            <div class="col-md-4 form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="">-- Select Gender --</option>
                                    <option value="male" {{ (isset($employee) && $employee->gender == 'male') ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ (isset($employee) && $employee->gender == 'female') ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>DOB</label>
                                <input type="date" name="dob" class="form-control" value="{{ $employee->dob ?? '' }}">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Hire Date</label>
                                <input type="date" name="hire_date" class="form-control" value="{{ $employee->hire_date ?? date('Y-m-d') }}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>National ID</label>
                                <input type="text" name="national_id" class="form-control" placeholder="National ID" value="{{ $employee->national_id ?? '' }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Phone</label>
                                <input type="text" name="phone_number" class="form-control" placeholder="Phone" value="{{ $employee->phone_number ?? '' }}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">-- Select Status --</option>
                                    <option value="active" {{ (isset($employee) && $employee->status == 'active') ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ (isset($employee) && $employee->status == 'inactive') ? 'selected' : '' }}>Inactive</option>
                                    <option value="terminated" {{ (isset($employee) && $employee->status == 'terminated') ? 'selected' : '' }}>Terminated</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Type</label>
                                <select name="employee_type" class="form-control">
                                    <option value="">-- Select Type --</option>
                                    <option value="full_time" {{ (isset($employee) && $employee->employee_type == 'full_time') ? 'selected' : '' }}>Full Time</option>
                                    <option value="part_time" {{ (isset($employee) && $employee->employee_type == 'part_time') ? 'selected' : '' }}>Part Time</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Department</label>
                                <select name="department_id" class="form-control">
                                    <option value="">-- Select Department --</option>
                                    @forelse($departments ?? [] as $department)
                                        <option value="{{ $department->department_id }}" {{ (isset($employee) && $employee->department_id == $department->department_id) ? 'selected' : '' }}>
                                            {{ $department->department_name }}
                                        </option>
                                    @empty
                                        <option disabled>No departments available</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Position</label>
                                <select name="position_id" class="form-control">
                                    <option value="">-- Select Position --</option>
                                    @forelse($positions ?? [] as $position)
                                        <option value="{{ $position->position_id }}" {{ (isset($employee) && $employee->position_id == $position->position_id) ? 'selected' : '' }}>
                                            {{ $position->position_title }}
                                        </option>
                                    @empty
                                        <option disabled>No positions available</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="col-md-12 form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control" rows="2" placeholder="Address">{{ $employee->address ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

{{-- Image Preview Script --}}
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);

            // Update the label text with the file name
            var fileName = input.files[0].name;
            var label = input.nextElementSibling;
            label.innerText = fileName;
        }
    }
</script>
@endsection
