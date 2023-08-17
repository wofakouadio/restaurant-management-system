@extends('layouts/app')
@push('title') <title>Super-Admin | Restaurant Management System</title> @endpush
@section('content')
    <div class="content">
        <div class="content-heading d-flex justify-content-between align-items-center">
            <span>
              New User <small class="d-none d-sm-inline"> <i class="fa fa-user-plus"></i> </small>
            </span>
        </div>
        <!-- Mega Form -->
        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{route('sa.register-new-user')}}" method="POST" enctype="multipart/form-data" id="sa-new-user-form">
                    @csrf
                    <div class="alert alert-danger" id="new-user-form-alert"></div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label" for="mega-firstname">Firstname</label>
                            <input type="text" class="form-control form-control-lg" id="mega-firstname" name="firstname" placeholder="Enter your firstname..">
                            <span class="text-danger" id="firstname-err"></span>
                        </div>
                        <div class="col">
                            <label class="form-label" for="mega-middlename">MiddleName</label>
                            <input type="text" class="form-control form-control-lg" id="mega-middlename" name="middlename" placeholder="Enter your middlename..">
                        </div>
                        <div class="col">
                            <label class="form-label" for="mega-lastname">Lastname</label>
                            <input type="text" class="form-control form-control-lg" id="mega-lastname" name="lastname" placeholder="Enter your lastname..">
                            <span class="text-danger" id="lastname-err"></span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label" for="mega-dob">Date of Birth</label>
                            <input type="text" class="js-flatpickr form-control form-control-lg" id="example-flatpickr-default"  name="dob" placeholder="Y-m-d">
                            <span class="text-danger" id="dob-err"></span>
                        </div>
                        <div class="col">
                            <label class="form-label" for="mega-placeofbirth">Place of Birth</label>
                            <input type="text" class="form-control form-control-lg" id="mega-placeofbirth" name="placeofbirth" placeholder="Enter your place of birth..">
                            <span class="text-danger" id="placeofbirth-err"></span>
                        </div>
                        <div class="col">
                            <label class="form-label" for="mega-gender">Gender</label>
                            <select class="form-select form-control form-control-lg" id="mega-gender" name="gender">
                                <option value="">Choose</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <span class="text-danger" id="gender-err"></span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label" for="mega-address-1">Main Address</label>
                            <input type="text" class="form-control form-control-lg" id="mega-address-1" name="address" placeholder="Enter your address..">
                            <span class="text-danger" id="main-address-err"></span>
                        </div>
                        <div class="col">
                            <label class="form-label" for="mega-address-2">Secondary Address</label>
                            <input type="text" class="form-control form-control-lg" id="mega-address-2" name="secondary-address" placeholder="Enter your secondary address..">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label" for="mega-contact1">Contact[Mobile]</label>
                            <input type="text" class="form-control form-control-lg" id="mega-contact1" name="contact" placeholder="Enter your contact..">
                            <span class="text-danger" id="main-contact-err"></span>
                        </div>
                        <div class="col">
                            <label class="form-label" for="mega-contact-2">Phone</label>
                            <input type="text" class="form-control form-control-lg" id="mega-contact-2" name="secondary-contact" placeholder="Enter your secondary contact..">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label" for="mega-email">Email Address</label>
                            <input type="text" class="form-control form-control-lg" id="mega-email" name="email" placeholder="Enter your email address..">
                            <span class="text-danger" id="email-address-err"></span>
                        </div>
                        <div class="col">
                            <label class="form-label" for="mega-username">Username</label>
                            <input type="text" class="form-control form-control-lg" id="mega-username" name="username" placeholder="Enter your username..">
                            <span class="text-danger" id="username-err"></span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label" for="example-file-input">Upload Profile Picture</label>
                            <input class="form-control form-control-lg" type="file" id="example-file-input" name="profile-picture">
                        </div>
                        <div class="col">
                            <label class="form-label" for="mega-role">Role</label>
                            <select class="form-select form-control form-control-lg" id="mega-role" name="role">
                                <option value="">Choose</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="role-type-err"></span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary" name="btn-new-user" id="btn-new-user">
                            <i class="fa fa-check opacity-50 me-1"></i> Add New User
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Mega Form -->
    </div>
@endsection
