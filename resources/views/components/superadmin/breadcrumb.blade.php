
@if(url()->current() === route('sa.dashboard'))
    <div class="bg-body-light border-bottom">
        <div class="content py-1 text-center">
            <nav class="breadcrumb bg-body-light py-2 mb-0">
                <span class="breadcrumb-item">Home</span>
                <a class="breadcrumb-item active text-warning" href="{{route('sa.dashboard')}}">Dashboard</a>
            </nav>
        </div>
    </div>
@elseif(url()->current() === route('sa.new-user'))
    <div class="bg-body-light border-bottom">
        <div class="content py-1 text-center">
            <nav class="breadcrumb bg-body-light py-2 mb-0">
                <span class="breadcrumb-item">Home</span>
                <span class="breadcrumb-item">Users</span>
                <a class="breadcrumb-item active text-warning" href="{{route('sa.new-user')}}">New User</a>
            </nav>
        </div>
    </div>
@elseif(url()->current() === route('sa.all-users'))
    <div class="bg-body-light border-bottom">
        <div class="content py-1 text-center">
            <nav class="breadcrumb bg-body-light py-2 mb-0">
                <span class="breadcrumb-item">Home</span>
                <span class="breadcrumb-item">Users</span>
                <a class="breadcrumb-item active text-warning" href="{{route('sa.all-users')}}">All Users</a>
            </nav>
        </div>
    </div>
@elseif(url()->current() === route('sa.categories'))
    <div class="bg-body-light border-bottom">
        <div class="content py-1 text-center">
            <nav class="breadcrumb bg-body-light py-2 mb-0">
                <span class="breadcrumb-item">Home</span>
                <span class="breadcrumb-item">Kits</span>
                <a class="breadcrumb-item active text-warning" href="{{route('sa.categories')}}">Categories</a>
            </nav>
        </div>
    </div>
@elseif(url()->current() === route('sa.new-menu'))
    <div class="bg-body-light border-bottom">
        <div class="content py-1 text-center">
            <nav class="breadcrumb bg-body-light py-2 mb-0">
                <span class="breadcrumb-item">Home</span>
                <span class="breadcrumb-item">Kits</span>
                <a class="breadcrumb-item active text-warning" href="{{route('sa.new-menu')}}">New Menu</a>
            </nav>
        </div>
    </div>
@elseif(url()->current() === route('sa.all-menus'))
    <div class="bg-body-light border-bottom">
        <div class="content py-1 text-center">
            <nav class="breadcrumb bg-body-light py-2 mb-0">
                <span class="breadcrumb-item">Home</span>
                <span class="breadcrumb-item">Kits</span>
                <a class="breadcrumb-item active text-warning" href="{{route('sa.all-menus')}}">Menus</a>
            </nav>
        </div>
    </div>
@elseif(url()->current() === route('sa.new-order'))
    <div class="bg-body-light border-bottom">
        <div class="content py-1 text-center">
            <nav class="breadcrumb bg-body-light py-2 mb-0">
                <span class="breadcrumb-item">Home</span>
                <span class="breadcrumb-item">Orders</span>
                <a class="breadcrumb-item active text-warning" href="{{route('sa.new-order')}}">New Order</a>
            </nav>
        </div>
    </div>
@elseif(url()->current() === route('sa.orders-list'))
    <div class="bg-body-light border-bottom">
        <div class="content py-1 text-center">
            <nav class="breadcrumb bg-body-light py-2 mb-0">
                <span class="breadcrumb-item">Home</span>
                <span class="breadcrumb-item">Orders</span>
                <a class="breadcrumb-item active text-warning" href="{{route('sa.orders-list')}}">List</a>
            </nav>
        </div>
    </div>
@endif
