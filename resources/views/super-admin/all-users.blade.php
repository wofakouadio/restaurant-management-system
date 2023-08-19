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
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar16.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Adam McCoy</td>
                        <td class="d-none d-sm-table-cell">client1@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar12.jp')}}g" alt="">
                        </td>
                        <td class="fw-semibold">Brian Stevens</td>
                        <td class="d-none d-sm-table-cell">client2@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-warning">Trial</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar15.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Jeffrey Shaw</td>
                        <td class="d-none d-sm-table-cell">client3@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar16.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Albert Ray</td>
                        <td class="d-none d-sm-table-cell">client4@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar9.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Scott Young</td>
                        <td class="d-none d-sm-table-cell">client5@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-success">VIP</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar16.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Adam McCoy</td>
                        <td class="d-none d-sm-table-cell">client1@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar12.jp')}}g" alt="">
                        </td>
                        <td class="fw-semibold">Brian Stevens</td>
                        <td class="d-none d-sm-table-cell">client2@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-warning">Trial</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar15.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Jeffrey Shaw</td>
                        <td class="d-none d-sm-table-cell">client3@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar16.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Albert Ray</td>
                        <td class="d-none d-sm-table-cell">client4@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar9.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Scott Young</td>
                        <td class="d-none d-sm-table-cell">client5@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-success">VIP</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar16.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Adam McCoy</td>
                        <td class="d-none d-sm-table-cell">client1@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar12.jp')}}g" alt="">
                        </td>
                        <td class="fw-semibold">Brian Stevens</td>
                        <td class="d-none d-sm-table-cell">client2@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-warning">Trial</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar15.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Jeffrey Shaw</td>
                        <td class="d-none d-sm-table-cell">client3@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar16.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Albert Ray</td>
                        <td class="d-none d-sm-table-cell">client4@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar9.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Scott Young</td>
                        <td class="d-none d-sm-table-cell">client5@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-success">VIP</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar16.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Adam McCoy</td>
                        <td class="d-none d-sm-table-cell">client1@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar12.jp')}}g" alt="">
                        </td>
                        <td class="fw-semibold">Brian Stevens</td>
                        <td class="d-none d-sm-table-cell">client2@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-warning">Trial</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar15.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Jeffrey Shaw</td>
                        <td class="d-none d-sm-table-cell">client3@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar16.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Albert Ray</td>
                        <td class="d-none d-sm-table-cell">client4@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar9.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Scott Young</td>
                        <td class="d-none d-sm-table-cell">client5@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-success">VIP</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar16.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Adam McCoy</td>
                        <td class="d-none d-sm-table-cell">client1@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar12.jp')}}g" alt="">
                        </td>
                        <td class="fw-semibold">Brian Stevens</td>
                        <td class="d-none d-sm-table-cell">client2@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-warning">Trial</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar15.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Jeffrey Shaw</td>
                        <td class="d-none d-sm-table-cell">client3@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar16.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Albert Ray</td>
                        <td class="d-none d-sm-table-cell">client4@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar9.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Scott Young</td>
                        <td class="d-none d-sm-table-cell">client5@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-success">VIP</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar16.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Adam McCoy</td>
                        <td class="d-none d-sm-table-cell">client1@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar12.jp')}}g" alt="">
                        </td>
                        <td class="fw-semibold">Brian Stevens</td>
                        <td class="d-none d-sm-table-cell">client2@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-warning">Trial</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar15.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Jeffrey Shaw</td>
                        <td class="d-none d-sm-table-cell">client3@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar16.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Albert Ray</td>
                        <td class="d-none d-sm-table-cell">client4@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-primary">Personal</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="{{asset('assets/media/avatars/avatar9.jpg')}}" alt="">
                        </td>
                        <td class="fw-semibold">Scott Young</td>
                        <td class="d-none d-sm-table-cell">client5@example.com</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge bg-success">VIP</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Mega Form -->
    </div>
@endsection
