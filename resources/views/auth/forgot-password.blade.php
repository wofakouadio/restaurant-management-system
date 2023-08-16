@extends('layouts/auth')
@push('title') <title> Forgot Password | Restaurant Management System</title> @endpush
@section('content')
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-image: url({{asset('assets/media/photos/photo44.jpg')}});">
            <div class="row mx-0 bg-black-50">
                <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                    <div class="p-4">
                        <p class="fs-3 fw-semibold text-white">
                            Restaurant Management System
                        </p>
                        <p class="text-white-75 fw-medium">
                            Copyright &copy; <span data-toggle="year-copy"></span>
                        </p>
                    </div>
                </div>
                <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-body-extra-light">
                    <div class="content content-full">
                        <!-- Header -->
                        <div class="px-4 py-2 mb-4">
                            <div class="text-center">
                                <img src="{{asset('favicon/android-chrome-512x512.png')}}" alt="logo" width="100px"/>
                            </div>
                            <h1 class="h3 fw-bold mt-4 mb-2">Create New Account</h1>
                            <h2 class="h5 fw-medium text-muted mb-0">Please add your details</h2>
                        </div>
                        <!-- END Header -->

                        <!-- Reminder Form -->
                        <!-- jQuery Validation functionality is initialized with .js-validation-reminder class in js/pages/op_auth_reminder.min.js which was auto compiled from _js/pages/op_auth_reminder.js -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-reminder px-4" action="" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="reminder-credential" name="reminder-credential" placeholder="Enter your email or username">
                                <label class="form-label" for="reminder-credential">Username or Email</label>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-lg btn-alt-warning fw-semibold">
                                    Reset Password
                                </button>
                                <div class="mt-4">
                                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="/">
                                        <i class="fa fa-arrow-left opacity-50 me-1"></i> Sign In
                                    </a>
                                </div>
                            </div>
                        </form>
                        <!-- END Reminder Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
@endsection
