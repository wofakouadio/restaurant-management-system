@extends('layouts/app')
@push('title') <title>Super-Admin | Restaurant Management System</title> @endpush
@section('content')
    <div class="content">
        <div class="content-heading d-flex justify-content-between align-items-center">
            <span>
              All Users <small class="d-none d-sm-inline"> <i class="fa fa-users-line"></i> </small>
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
                        <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                        <th class="d-none d-md-table-cell" style="width: 15%;">Access</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="text-center">
                                <img class="img-avatar img-avatar48" src="{{$user->profile_picture ? asset('storage/'.$user->profile_picture) : asset('images/no-image.png')}}" alt="">
                            </td>
                            <td class="fw-semibold">{{$user->sur_name}} {{$user->middle_name}} {{$user->last_name}}</td>
                            <td class="d-none d-sm-table-cell">{{$user->user_mail}}</td>
                            <td class="d-none d-md-table-cell">
                                @if($user->role_id === 1)
                                    <span class="badge bg-primary">{{$user->role}}</span>
                                @elseif($user->role_id === 2)
                                    <span class="badge bg-info">{{$user->role}}</span>
                                @elseif($user->role_id === 3)
                                    <span class="badge bg-warning">{{$user->role}}</span>
                                @elseif($user->role_id === 4)
                                    <span class="badge bg-danger">{{$user->role}}</span>
                                @else
                                    <span class="badge bg-success">{{$user->role}}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-secondary" title="Edit" data-bs-toggle="modal" data-bs-target="#edit-user-modal-form" data-user_id="{{$user->userid}}">
                                        <i class="fa fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#delete-user-modal-form" data-user_id="{{$user->userid}}">
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
