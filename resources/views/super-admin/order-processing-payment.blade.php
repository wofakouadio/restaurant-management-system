@extends('layouts/payment')
@push('title') <title>Order Payment</title> @endpush
@section('content')
    <div class="content content-boxed content-full overflow-hidden">
        <!-- Header -->
        <div class="py-5 text-center">
            <a class="fw-bold">
                <div class="text-center">
                    <img src="{{asset('favicon/android-chrome-512x512.png')}}" alt="logo" width="100px"/>
                </div>
            </a>
            <h1 class="fs-3 fw-bold mt-4 mb-2">
                Complete Payment
            </h1>
        </div>
        <!-- END Header -->
        <!-- Checkout -->
        <form action="" method="POST" id="order-payment-form">
            @csrf
            <div class="alert payment-alert"></div>
            @unless($status->isEmpty())
                @php
                    $DecodeStatus = json_decode($status, true);
                    if($DecodeStatus[0]['status'] === 0){
                @endphp
                    <div class="row">
                    <!-- Order Info -->
                    <div class="col-xl-7">
                        <!-- Payment -->
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">
                                    Payment
                                </h3>
                            </div>
                            @unless($paymentType->isEmpty())
                                @php
                                    $DecodePaymentType = json_decode($paymentType, true);
                                    switch ($DecodePaymentType[0]['payment_method']){
                                        case 1:
                                @endphp
                                <div class="block-content block-content-full">
                                    <div class="row g-3">
                                        <div class="col-6 col-sm-6">
                                            <div class="form-check form-block">
                                                <input type="radio" class="form-check-input" id="checkout-payment-1" name="checkout-payment" checked> In-Store
                                                <input type="hidden" name="payment_method" value="{{$DecodePaymentType[0]['payment_method']}}">
                                                <input type="hidden" name="order_id" value="{{$order_id}}">
                                                <label class="form-check-label bg-body-light" for="checkout-payment-1">
                                                        <span class="d-block p-1 ratio ratio-21x9">
                                                            <img src="{{asset('assets/media/payments/shopping.svg')}}" alt="payment-logo">
                                                        </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-0">
                                @php
                                    break;
                                case 2:
                                @endphp
                                <div class="block-content block-content-full">
                                    <div class="row g-3">
                                        <div class="col-6 col-sm-6">
                                            <div class="form-check form-block">
                                                <input type="radio" class="form-check-input" id="checkout-payment-2" name="checkout-payment" checked> Mobile Money
                                                <input type="hidden" name="payment_method" value="{{$DecodePaymentType[0]['payment_method']}}">
                                                <input type="hidden" name="order_id" value="{{$order_id}}">
                                                <label class="form-check-label bg-body-light" for="checkout-payment-2">
                                                                <span class="d-block p-1 ratio ratio-21x9">
                                                                    <img src="{{asset('assets/media/payments/mobilemoney.jpg')}}" alt="payment-logo">
                                                                </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-0">
                                <div class="block-content block-content-full">
                                    <div class="p-3 rounded-3 bg-body-light">
                                        <div class="mb-4">
                                            <div class="form-floating">
                                                <select class="form-select" id="example-select-floating" name="network" aria-label="Floating label select example">
                                                    <option selected="">Select an option</option>
                                                    <option value="MTN">MTN</option>
                                                    <option value="Vodafone">Vodafone</option>
                                                    <option value="AirtelTigo">AirtelTigo</option>
                                                </select>
                                                <label class="form-label" for="example-select-floating">Network Operator</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="payment-card-name" name="momo-number" placeholder="Enter your mobile money number">
                                                <label class="form-label" for="payment-card-name">Mobile Money Number</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    break;
                                    case 3:
                                @endphp
                                <div class="block-content block-content-full">
                                    <div class="row g-3">
                                        <div class="col-6 col-sm-6">
                                            <div class="form-check form-block">
                                                <input type="radio" class="form-check-input" id="checkout-payment-3" name="checkout-payment" checked> VisaCard/MasterCard/Debit Card
                                                <input type="hidden" name="payment_method" value="{{$DecodePaymentType[0]['payment_method']}}">
                                                <input type="hidden" name="order_id" value="{{$order_id}}">
                                                <label class="form-check-label bg-body-light" for="checkout-payment-3">
                                                            <span class="d-block p-1 ratio ratio-21x9">
                                                                <img src="{{asset('assets/media/payments/visa-master.png')}}" alt="payment-logo">
                                                            </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-0">
                                <div class="block-content block-content-full">
                                    <div class="p-3 rounded-3 bg-body-light">
                                        <div class="mb-4">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="payment-card-number" name="payment-card-number" placeholder="**** **** **** ****">
                                                <label class="form-label" for="payment-card-number">Card Number</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="payment-expriration" name="payment-expriration" placeholder="MM / YY">
                                                    <label class="form-label" for="payment-expriration">MM / YY</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="payment-cvc" name="payment-cvc" placeholder="***">
                                                    <label class="form-label" for="payment-cvc">CVC</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="payment-card-name" name="payment-card-name" placeholder="Enter your name">
                                                <label class="form-label" for="payment-card-name">Name on Card</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    break;
                                    case 4:
                                @endphp
                                <div class="block-content block-content-full">
                                    <div class="row g-3">
                                        <div class="col-6 col-sm-6">
                                            <div class="form-check form-block">
                                                <input type="radio" class="form-check-input" id="checkout-payment-4" name="checkout-payment" checked> PayPal
                                                <input type="hidden" name="payment_method" value="{{$DecodePaymentType[0]['payment_method']}}">
                                                <input type="hidden" name="order_id" value="{{$order_id}}">
                                                <label class="form-check-label bg-body-light" for="checkout-payment-4">
                                                            <span class="d-block p-1 ratio ratio-21x9">
                                                                <img src="{{asset('assets/media/payments/paypal.png')}}" alt="payment-logo">
                                                            </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-0">
                                <div class="block-content block-content-full">
                                    <div class="p-3 rounded-3 bg-body-light">
                                        <div class="mb-4">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="payment-card-number" name="payment-card-number" placeholder="**** **** **** ****">
                                                <label class="form-label" for="payment-card-number">Card Number</label>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="payment-expriration" name="payment-expriration" placeholder="MM / YY">
                                                    <label class="form-label" for="payment-expriration">MM / YY</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="payment-cvc" name="payment-cvc" placeholder="***">
                                                    <label class="form-label" for="payment-cvc">CVC</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="payment-card-name" name="payment-card-name" placeholder="Enter your name">
                                                <label class="form-label" for="payment-card-name">Name on Card</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    break;
                                    }
                                @endphp
                            @endunless
                        </div>
                        <!-- Payment -->
                    </div>
                    <!-- END Order Info -->

                    <!-- Order Summary -->
                    <div class="col-xl-5 order-xl-last">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">
                                    Order Summary
                                </h3>
                            </div>
                            <div class="block-content block-content-full">
                                <table class="table table-vcenter">
                                    <tbody>
                                    @unless($orderDetails->isEmpty())
                                        @php
                                            $jsonData = json_decode($orderDetails, true);
                                            if (is_array($jsonData) && !empty($jsonData)){
                                                $itemJSON = $jsonData[0]['items'];
                                                $items = json_decode($itemJSON, true);
                                                foreach ($items as $item){
                                        @endphp
                                        <tr>
                                            <td class="ps-0">
                                                <a class="fw-semibold text-warning" href="javascript:void(0)">{{$item['item_name']}}</a>
                                                <div class="fs-sm text-muted">Quantity : {{$item['item_quantity']}}</div>
                                            </td>
                                            <td class="pe-0 fw-medium text-end">GH₵ {{$item['item_subtotal']}}</td>
                                        </tr>
                                        @php
                                            }
                                        }
                                        @endphp
                                    @else

                                    @endunless

                                    </tbody>
                                    <tbody>
                                    <tr>
                                        <td class="ps-0 fw-medium">Total</td>
                                        @unless($orderTotal->isEmpty())
                                            @php
                                                $OrderTotal = json_decode($orderTotal, true);
                                            @endphp
                                            <td class="pe-0 fw-bold text-end">GH₵ {{$OrderTotal[0]['total']}}</td>
                                            <input type="hidden" name="total" value="{{$OrderTotal[0]['total']}}">
                                            <input type="hidden" name="order_id" value="{{$order_id}}">
                                            @php
                                                @endphp
                                        @endunless
                                    </tr>
                                    </tbody>
                                    <tbody>
                                    <tr>
                                        @unless($remarks->isEmpty())
                                            @php
                                                $Remarks = json_decode($remarks, true);
                                            @endphp
                                            <td class="ps-0 fw-bold text-justify" colspan="2">Note: {{$Remarks[0]['remarks']}}</td>
                                            @php
                                                @endphp
                                        @endunless
                                    </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-warning w-100 py-3">
                                    <i class="fa fa-check opacity-50 me-1"></i>
                                    Complete Order
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- END Order Summary -->
                </div>
                @php
                    }else{
                @endphp
                    <div class="row">
                    <!-- Order Info -->
                    <div class="col-xl-12">
                        <!-- Payment -->
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">
                                    Notice
                                </h3>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="row g-3">
                                    <div class="col-6 col-sm-6">
                                        <div class=""></div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-0">
                        </div>
                        <!-- Payment -->
                    </div>
                    <!-- END Order Info -->
                </div>
                @php
                    }
                @endphp
            @endunless
        </form>
        <!-- END Checkout -->
    </div>
@endsection
