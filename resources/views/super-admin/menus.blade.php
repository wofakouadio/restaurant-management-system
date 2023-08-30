@extends('layouts/app')
@push('title') <title>Super-Admin | Restaurant Management System</title> @endpush
@section('content')
    <div class="content">
        <div class="content-heading d-flex justify-content-between align-items-center">
            <span>
              Menus <small class="d-none d-sm-inline"> <i class="fa fa-users-line"></i> </small>
            </span>
        </div>
        <!-- Mega Form -->
        <div class="block block-rounded">
            <div class="block-content">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Category</th>
                        <th>Sub-Category</th>
                        <th>Status</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $menu)
                        <tr>
                            <td class="text-center">
                                <img class="img-avatar img-avatar48" src="{{$menu->image ? asset('storage/'.$menu->image) : asset('images/no-image.png')}}" alt="img">
                            </td>
                            <td class="fw-semibold">{{$menu->name}}</td>
                            <td class="fw-semibold">{{$menu->price}}</td>
                            <td class="fw-semibold">{{$menu->discount}} %</td>
                            <td class="fw-semibold">{{$menu->category_name}}</td>
                            <td class="fw-semibold">{{$menu->sub_category_name}}</td>
                            <td class="fw-semibold">
                                @if($menu->status === 1)
                                    <span class="fw-semibold badge bg-success text-uppercase">{{__('Available')}}</span>
                                @else
                                    <span class="fw-semibold badge bg-danger text-uppercase">{{__('Out')}}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-secondary" title="Edit" data-bs-toggle="modal" data-bs-target="#edit-menu-modal" data-menu_id="{{$menu->menu_id}}">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#delete-menu-modal" data-menu_id="{{$menu->menu_id}}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Mega Form -->
    </div>
    <x-sa-modals/>
@endsection
