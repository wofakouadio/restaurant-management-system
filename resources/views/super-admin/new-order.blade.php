@extends('layouts/app')
@push('title') <title>Super-Admin | Restaurant Management System</title> @endpush
@section('content')
    <div class="content">
        <div class="content-heading d-flex justify-content-between align-items-center">
            <span>
              New Order <small class="d-none d-sm-inline"> <i class="fa fa-bowl-food"></i> </small>
            </span>
        </div>
        <!-- Mega Form -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="block block-rounded">
                    <div class="block-content">
                        <div class="row items-push">
                            @unless($menus->isEmpty())
                                @foreach($menus as $menu)
                                    <div class="col-md-4 animated fadeIn">
                                        <div class="options-container">
                                            <img class="img-fluid options-item" src="{{$menu->image ? asset('storage/'.$menu->image) : asset('images/no-image.png')}}" alt="">
                                            <div class="options-overlay bg-black-75">
                                                <div class="options-overlay-content">
                                                    <h3 class="h2 text-white mb-1">{{$menu->name}}</h3>
                                                    <h4 class="h3 text-white-75 mb-3">GH₵ {{$menu->price}}</h4>
                                                    <a class="btn btn-sm btn-alt-primary" data-bs-toggle="modal" data-bs-target="#AddToCart" data-menu_id="{{$menu->menu_id}}">
                                                        <i class="fa fa-pencil-alt opacity-50 me-1"></i> Add to Cart
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12 animated fadeIn">
                                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                                        <i class="fa fa-fw fa-exclamation-triangle display-1 me-2"></i>
                                        <h2 class="mb-0">
                                            Menu is not available at the moment. Come back later!
                                        </h2>
                                    </div>
                                </div>
                            @endunless
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="block block-rounded">
                    <div class="block-content">
                        <h4 class="h3 fw-bold"><i class="fa fa-cart-shopping"></i> Cart</h4>
                        <div id="cart-items">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END Mega Form -->
    </div>
    <x-sa-modals/>
@endsection
