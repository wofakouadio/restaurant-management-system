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
                        <div class="px-4 py-2 mb-4">
                            <div class="text-center">
                                <img src="{{asset('favicon/android-chrome-512x512.png')}}" alt="logo" width="100px"/>
                            </div>
                            <h1 class="h3 fw-bold mt-4 mb-2">Create New Account</h1>
                            <h2 class="h5 fw-medium text-muted mb-0">Please add your details</h2>
                        </div>
                        <!-- END Header -->

                        <!-- Sign Up Form -->
                        <!-- jQuery Validation functionality is initialized with .js-validation-signup class in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-signup px-4" action="" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="signup-username" name="signup-username" placeholder="Enter your Username">
                                <label class="form-label" for="signup-username">Username</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="email" class="form-control" id="signup-email" name="signup-email" placeholder="Enter your email">
                                <label class="form-label" for="signup-email">Email</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="signup-password" name="signup-password" placeholder="Enter your password">
                                <label class="form-label" for="signup-password">Password</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="signup-password-confirm" name="signup-password-confirm" placeholder="Confirm Password">
                                <label class="form-label" for="signup-password-confirm">Confirm Password</label>
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="signup-terms" name="signup-terms" value="1">
                                    <label class="form-check-label" for="signup-terms">I agree to Terms</label>
                                </div>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-lg btn-alt-warning fw-semibold">
                                    Create Account
                                </button>
                                <div class="mt-4">
                                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="#" data-bs-toggle="modal" data-bs-target="#modal-terms">
                                        Read Terms
                                    </a>
                                    <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="/">
                                        Sign In
                                    </a>
                                </div>
                            </div>
                        </form>
                        <!-- END Sign Up Form -->
                    </div>
                </div>

                <!-- Terms Modal -->
                <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
                        <div class="modal-content">
                            <div class="block block-rounded shadow-none mb-0">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Terms &amp; Conditions</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content fs-sm">
                                    <h5 class="mb-2">1. General</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.
                                    </p>
                                    <h5 class="mb-2">2. Account</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.
                                    </p>
                                    <h5 class="mb-2">3. Service</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.
                                    </p>
                                    <h5 class="mb-2">4. Payments</h5>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.
                                    </p>
                                </div>
                                <div class="block-content block-content-full block-content-sm text-end border-top">
                                    <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="button" class="btn btn-alt-primary" data-bs-dismiss="modal">
                                        Done
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Terms Modal -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
@endsection
