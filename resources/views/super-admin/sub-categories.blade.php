@extends('layouts/app')
@push('title') <title>Super-Admin | Restaurant Management System</title> @endpush
@section('content')
    <div class="content">
        <div class="content-heading d-flex justify-content-between align-items-center">
            <span>
              Sub-Categories <small class="d-none d-sm-inline"> <i class="fa fa-users-line"></i> </small>
            </span>
        </div>
        <!-- Mega Form -->
        <div class="block block-rounded">
            <div class="block-content">
                <button type="button" data-bs-toggle="modal" data-bs-target="#add-sub-category-modal" class="btn btn-alt-primary mb-4">Add Sub-Category</button>
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                        <th>Name</th>
                        <th>Category</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    @foreach($categories as $category)--}}
{{--                        <tr>--}}
{{--                            <td class="text-center">--}}
{{--                                <img class="img-avatar img-avatar48" src="{{$category->image ? asset('storage/'.$category->image) : asset('images/no-image.png')}}" alt="">--}}
{{--                            </td>--}}
{{--                            <td class="fw-semibold">{{$category->name}}</td>--}}
{{--                            <td class="text-center">--}}
{{--                                <div class="btn-group">--}}
{{--                                    <button type="button" class="btn btn-sm btn-secondary" title="Edit" data-bs-toggle="modal" data-bs-target="#edit-category-modal" data-cat_id="{{$category->cat_id}}">--}}
{{--                                        <i class="fa fa-pencil-alt"></i>--}}
{{--                                    </button>--}}
{{--                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#delete-category-modal" data-cat_id="{{$category->cat_id}}">--}}
{{--                                        <i class="fa fa-times"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}

                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Mega Form -->
    </div>
    <x-sa-modals/>
@endsection
