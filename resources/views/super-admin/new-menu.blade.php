@extends('layouts/app')
@push('title') <title>Super-Admin | Restaurant Management System</title> @endpush
@section('content')
    <div class="content">
        <div class="content-heading d-flex justify-content-between align-items-center">
            <span>
              New Menu <small class="d-none d-sm-inline"> <i class="fa fa-user-plus"></i> </small>
            </span>
        </div>
        <!-- Mega Form -->
        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{route('sa.add-new-menu')}}" method="POST" enctype="multipart/form-data" id="sa-new-menu-form">
                    @csrf
                    <div class="alert alert-danger menu-alert"></div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control form-control-lg" name="name" placeholder="Enter your menu..">
                            <span class="text-danger" id="name-err"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Category</label>
                            <select name="cat-id" class="js-select2 form-control form-control-lg">
                                <option value="">Choose</option>
                            </select>
                            <span class="text-danger" id="category-err"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Sub-Category</label>
                            <select name="sub-cat-id" class="js-select2 form-control form-control-lg">
                                <option value="">Choose</option>
                            </select>
                            <span class="text-danger" id="sub-category-err"></span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control form-control-lg" cols="10" rows="5"></textarea>
                            <span class="text-danger" id="description-err"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Extra</label>
                            <textarea name="extra" class="form-control form-control-lg" cols="10" rows="5"></textarea>
                            <span class="text-danger" id="extra-err"></span>
                        </div>
                        <div class="col">
                            <div class="mb-4">
                                <label>Pricing</label>
                                <input type="text" class="form-control form-control-lg" name="price">
                                <span class="text-danger" id="price-err"></span>
                            </div>
                            <div class="mb-4">
                                <label>Discount</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg" name="discount">
                                    <span class="input-group-text">
                                        <b>%</b>
                                    </span>
                                </div>
                                <span class="text-danger" id="discount-err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
{{--                        <div class="col">--}}
{{--                            <div class="mb-4">--}}
{{--                                <label class="form-label">Size</label>--}}
{{--                                <div class="space-x-2">--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        <input class="form-check-input" type="checkbox" value="Small" id="example-checkbox-inline1" name="size[]">--}}
{{--                                        <label class="form-check-label" for="example-checkbox-inline1">Small</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        <input class="form-check-input" type="checkbox" value="Medium" id="example-checkbox-inline2" name="size[]">--}}
{{--                                        <label class="form-check-label" for="example-checkbox-inline2">Medium</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        <input class="form-check-input" type="checkbox" value="Large" id="example-checkbox-inline3" name="size[]">--}}
{{--                                        <label class="form-check-label" for="example-checkbox-inline3">Large</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        <input class="form-check-input" type="checkbox" value="XLarge" id="example-checkbox-inline4" name="size[]">--}}
{{--                                        <label class="form-check-label" for="example-checkbox-inline4">XLarge</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col">
                            <label class="form-label" for="example-file-input">Upload Profile Picture</label>
                            <input class="form-control form-control-lg" type="file" id="example-file-input" name="profile-picture">
                        </div>
                        <div class="col">
                            <label class="form-label" for="mega-role">Status</label>
                            <select class="form-select form-control form-control-lg" name="status">
                                <option value="">Choose</option>
                                <option value="1">Available</option>
                                <option value="2">Out</option>
                            </select>
                            <span class="text-danger" id="status-err"></span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary" name="btn-new-user" id="btn-new-user">
                            <i class="fa fa-check opacity-50 me-1"></i> Add New Menu
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Mega Form -->
    </div>
@endsection
