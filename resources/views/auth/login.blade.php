@extends('layouts/auth')

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
                        <div class="text-center">
                            <img src="{{asset('favicon/android-chrome-512x512.png')}}" alt="logo" width="100px"/>
                        </div>
                        <div class="px-4 py-2 mb-4">
                            <h2 class="h5 fw-medium text-muted mb-0">Please sign in</h2>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-signin px-4" action="" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="login-username" name="login-username" placeholder="Enter your username">
                                <label class="form-label" for="login-username">Username</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="login-password" name="login-password" placeholder="Enter your password">
                                <label class="form-label" for="login-password">Password</label>
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="login-remember-me" name="login-remember-me" checked>
                                    <label class="form-check-label" for="login-remember-me">Remember Me</label>
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-lg btn-alt-warning fw-semibold">
                                    Sign In
                                </button>
                                <div class="mt-4">
                                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="/register">
                                        Create Account
                                    </a>
                                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="/forgot-password">
                                        Forgot Password
                                    </a>
                                </div>
                            </div>
                        </form>
                        <!-- END Sign In Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
@endsection
