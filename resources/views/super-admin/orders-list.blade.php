@extends('layouts/app')
@push('title') <title>Super-Admin | Restaurant Management System</title> @endpush
@section('content')
    <div class="content">
        <div class="content-heading d-flex justify-content-between align-items-center">
            <span>
              Orders <small class="d-none d-sm-inline"> <i class="fa fa-list-alt"></i> </small>
            </span>
        </div>
        <!-- Mega Form -->
        <div class="block block-rounded">
            <div class="block-content">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th><i class="fa fa-arrow-down-up-across-line"></i></th>
                        <th>Total</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="fw-semibold">{{$order->order_id}}</td>
                            <td class="fw-semibold">GH₵ {{$order->total}}</td>
                            <td class="fw-semibold">{{$order->created_at}}</td>
                            <td class="fw-semibold">
                                @if($order->status === 0)
                                    <span class="fw-semibold badge bg-warning text-uppercase">{{__('placed/pending')}}</span>
                                @elseif($order->status === 1)
                                    <span class="fw-semibold badge bg-primary text-uppercase">{{__('confirmed')}}</span>
                                @elseif($order->status === 2)
                                    <span class="fw-semibold badge bg-info text-uppercase">{{__('ready')}}</span>
                                @elseif($order->status === 3)
                                    <span class="fw-semibold badge bg-success text-uppercase">{{__('Delivered')}}</span>
                                @else
                                    <span class="fw-semibold badge bg-danger text-uppercase">{{__('cancelled')}}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    @if($order->status === 0)
                                        <a class="btn btn-sm btn-secondary" title="Payment" href="/super-admin/order-processing-payment/{{$order->order_id}}" target="_blank">
                                            <i class="fa fa-money-bill-transfer"></i>
                                        </a>
                                    @else
{{--                                        <button type="button" class="btn btn-sm btn-secondary" title="Edit" data-bs-toggle="modal" data-bs-target="#make-payment-order-modal" data-order_id="{{$order->order_id}}">--}}
{{--                                            <i class="fa fa-pencil-alt"></i>--}}
{{--                                        </button>--}}
                                    @endif
                                        <button type="button" title="Cancel" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#cancel-order-modal" data-order_id="{{$order->order_id}}">
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
