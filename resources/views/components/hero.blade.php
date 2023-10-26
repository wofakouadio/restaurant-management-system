<div class="bg-image" style="background-image: url('{{asset('assets/media/photos/photo44.jpg')}}');">
    <div class="bg-black-75">
        <div class="content content-top content-full text-center">
            <div class="py-3">
                <h1 class="h2 fw-bold text-white mb-2">Restaurant Management System Dashboard</h1>
                @switch(auth()->user()->role_type)
                    @case(1):
                        <h2 class="h4 fw-normal text-white-75 mb-0">Welcome Super-Admin, you have <a class="text-warning-light link-fx" href="{{route('sa.orders-list')}}" id="hero-dash-order-count"></a>.</h2>
                    @break
                    @case(2):
                        <h2 class="h4 fw-normal text-white-75 mb-0">Welcome Admin</h2>
                    @break
                    @case(3):
                        <h2 class="h4 fw-normal text-white-75 mb-0">Welcome Supervisor</h2>
                    @break
                    @case(4):
                        <h2 class="h4 fw-normal text-white-75 mb-0">Welcome Cashier.</h2>
                    @break
                    @default:
                        <h2 class="h4 fw-normal text-white-75 mb-0">Welcome Customer.</h2>
                @endswitch
            </div>
        </div>
    </div>
</div>
