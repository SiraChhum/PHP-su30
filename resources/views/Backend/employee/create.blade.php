@extends('backend.layouts.master')
@section('emp_menu-open','menu-open')
@section('emp_active','active')
@section('title','Add Employee')

@section('main-content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Employee Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Employee</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            {{-- Tabs Navigation --}}
            <div class="mb-3">
                <a href="{{ url('/employee') }}" class="btn btn-light">EmployeeList</a>
                <a href="{{ url('/employee/create') }}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Add New Employee</a>
            </div>

            <form action="{{ isset($employee) ? url('/employee/update/'.$employee->employee_id) : url('/employee/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @isset($employee)
                    @method('PUT')
                @endisset

                {{-- Position by Department Section --}}
                <div class="card card-info mb-3">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Position by Department</strong></h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label><strong>Department</strong></label>

                            <!-- Hidden input to store selected department_id -->
                            <input type="hidden" name="department_id" id="department_id" required>

                            <!-- Search Input -->
                            <input type="text"
                                id="department_search"
                                class="form-control"
                                placeholder="Search Department..."
                                autocomplete="off"
                                style="min-height:45px; padding:10px 12px; font-size:16px;">

                            <!-- Result List -->
                            <div id="department_list"
                                style="border:1px solid #ddd; border-top:none; max-height:200px; overflow-y:auto; display:none; background:#fff;">
                            </div>

                            @error('department_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                            <div class="form-group">
                                <label><strong>Position</strong></label>
                                <select name="position_id" id="position_id" class="form-control" style="min-height: 45px; padding: 10px 12px; font-size: 16px;">
                                    <option value="">---***Choose a Position***---</option>
                                    @forelse($positions ?? [] as $position)
                                        <option value="{{ $position->position_id }}" {{ (isset($employee) && $employee->position_id == $position->position_id) ? 'selected' : '' }}>
                                            {{ $position->position_title }}
                                        </option>
                                    @empty
                                        <option disabled>No positions available</option>
                                    @endforelse
                                </select>
                            </div>

                    </div>
                </div>

                <div class="row">
                    {{-- Left Column - Fill Employee Form --}}
                    <div class="col-md-6">
                        <div class="card card-danger">
                            <div class="card-header" style="background-color: #dc3545;">
                                <h3 class="card-title"><strong>Fill Employee Form</strong></h3>
                            </div>
                            <div class="card-body">
                                {{-- Full Name --}}
                                <div class="form-group">
                                    <label for="full_name"><strong>Full-name</strong></label>
                                    <input type="text" id="full_name" name="full_name" class="form-control @error('full_name') is-invalid @enderror" placeholder="" value="{{ $employee->full_name ?? '' }}" required>
                                    @error('full_name')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Gender --}}
                                <div class="form-group">
                                    <label for="gender"><strong>Gender</strong></label>
                                    <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                        <option value="">-- Select Gender --</option>
                                        <option value="male" {{ (isset($employee) && $employee->gender == 'male') ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ (isset($employee) && $employee->gender == 'female') ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- National --}}
                                <div class="form-group">
                                    <label for="national_id"><strong>National</strong></label>
                                    <select id="national_id" name="national_id" class="form-control" required>
                                        <option value="">-- Select Nationality --</option>
                                        <option value="khmer" {{ (isset($employee) && $employee->national_id == 'khmer') ? 'selected' : '' }}>Khmer</option>
                                        <option value="other" {{ (isset($employee) && $employee->national_id == 'other') ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>

                                {{-- Email --}}
                                <div class="form-group">
                                    <label for="email"><strong>Email</strong></label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="" value="{{ $employee->email ?? '' }}" required>
                                    @error('email')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Phone --}}
                                <div class="form-group">
                                    <label for="phone_number"><strong>Phone</strong></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="" value="{{ $employee->phone_number ?? '' }}" inputmode="numeric">
                                    </div>
                                </div>

                                {{-- Address --}}
                                <div class="form-group">
                                    <label for="address"><strong>Address</strong></label>
                                    <textarea id="address" name="address" class="form-control" rows="3" placeholder="">{{ $employee->address ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right Column - Date Picker & Additional Info --}}
                    <div class="col-md-6">
                        {{-- Date Picker Card --}}
                        <div class="card card-primary mb-3">
                            <div class="card-header" style="background-color: #007bff;">
                                <h3 class="card-title"><strong>Date picker</strong></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="dob"><strong>Date Of Birth:</strong></label>
                                    <div class="input-group">
                                        <input type="date" id="dob" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ $employee->dob ?? '' }}" required>
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                    @error('dob')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="hire_date"><strong>HireDate:</strong></label>
                                    <div class="input-group">
                                        <input type="date" id="hire_date" name="hire_date" class="form-control @error('hire_date') is-invalid @enderror" value="{{ $employee->hire_date ?? date('Y-m-d') }}" required>
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                    @error('hire_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Check Status Card --}}
                        <div class="card card-success mb-3">
                            <div class="card-header" style="background-color: #28a745;">
                                <h3 class="card-title"><strong>Check Status</strong></h3>
                            </div>
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status_active" value="active" {{ (isset($employee) && $employee->status == 'active') || !isset($employee) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_active">
                                        <i class="fas fa-check-circle text-primary"></i> Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status_inactive" value="inactive" {{ (isset($employee) && $employee->status == 'inactive') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_inactive">
                                        Inactive
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status_terminated" value="terminated" {{ (isset($employee) && $employee->status == 'terminated') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_terminated">
                                        Terminated
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- Photo Profile Card --}}
                        <div class="card card-primary">
                            <div class="card-header" style="background-color: #007bff;">
                                <h3 class="card-title"><strong>Photo Profile</strong></h3>
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <label><strong>Choose file</strong></label>
                                    <div class="mt-2">
                                        <img id="preview"
                                             src="{{ (isset($employee) && $employee->profile_photo) ? asset('storage/' . $employee->profile_photo) : asset('dist/img/avatar5.png') }}"
                                             alt="Profile Photo"
                                             style="max-height: 150px; max-width: 150px;">
                                    </div>
                                </div>
                                <div style="text-align: center;">
                                    <input type="file" name="profile_photo" class="custom-file-input d-none" id="profile_photo" accept="image/*" onchange="previewImage(this)">
                                    <button type="button" class="btn btn-light btn-sm mr-2" onclick="document.getElementById('profile_photo').click()">Browse</button>
                                    <button type="button" class="btn btn-light btn-sm">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Hidden fields for employee type (default: full_time) --}}
                <input type="hidden" name="employee_type" value="full_time">

                {{-- Submit Button --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block" style="padding: 12px; font-weight: bold; font-size: 16px;">
                            Add New Employee
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

{{-- Image Preview Script --}}
<script>
 const departments = @json($departments ?? []);

    const searchInput = document.getElementById('department_search');
    const resultBox = document.getElementById('department_list');
    const hiddenInput = document.getElementById('department_id');

    // Function to render list
    function renderList(list) {
        resultBox.innerHTML = '';

        if (list.length === 0) {
            resultBox.innerHTML = '<div style="padding:10px;">No department found</div>';
        } else {
            list.forEach(dep => {
                const item = document.createElement('div');
                item.textContent = dep.department_name;
                item.style.padding = '10px';
                item.style.cursor = 'pointer';

                item.addEventListener('click', function () {
                    searchInput.value = dep.department_name;
                    hiddenInput.value = dep.department_id;
                    resultBox.style.display = 'none';
                });

                item.addEventListener('mouseover', function () {
                    this.style.background = '#f1f1f1';
                });

                item.addEventListener('mouseout', function () {
                    this.style.background = '#fff';
                });

                resultBox.appendChild(item);
            });
        }

        resultBox.style.display = 'block';
    }

    // Show ALL when clicking input
    searchInput.addEventListener('focus', function () {
        renderList(departments);
    });

    // Filter when typing
    searchInput.addEventListener('input', function () {
        const keyword = this.value.toLowerCase();

        const filtered = departments.filter(dep =>
            dep.department_name.toLowerCase().includes(keyword)
        );

        renderList(filtered);
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function (e) {
        if (!searchInput.contains(e.target) && !resultBox.contains(e.target)) {
            resultBox.style.display = 'none';
        }
    });
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

    // Restrict phone number input to digits only
    document.getElementById('phone_number').addEventListener('input', function(e) {
        e.target.value = e.target.value.replace(/[^0-9]/g, '');
    });
</script>

@endsection
