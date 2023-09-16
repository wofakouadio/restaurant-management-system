<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header justify-content-lg-center">
            <!-- Logo -->
            <div>
                <a class="fw-bold tracking-wide mx-auto" href="{{url()->current()}}">
                    <img src="{{asset('favicon/apple-touch-icon.png')}}" alt="logo" width="70"/>
                </a>
            </div>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-fw fa-times"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{url()->current() == route('sa.dashboard') ? 'active': ''}}" href="{{route('sa.dashboard')}}">
                            <i class="nav-main-link-icon fa fa-house-user"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-main-heading">Kits</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{url()->current() == route('sa.categories') ? 'active': ''}}" href="{{route('sa.categories')}}">
                            <i class="nav-main-link-icon fa fa-grip-vertical"></i>
                            <span class="nav-main-link-name">Categories</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{url()->current() == route('sa.sub-categories') ? 'active': ''}}" href="{{route('sa.sub-categories')}}">
                            <i class="nav-main-link-icon fa fa-pencil-ruler"></i>
                            <span class="nav-main-link-name">Sub-Categories</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{url()->current() == route('sa.new-menu') ? 'active': ''}}" href="{{route('sa.new-menu')}}">
                            <i class="nav-main-link-icon fa fa-book-open-reader"></i>
                            <span class="nav-main-link-name">New Menu</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{url()->current() == route('sa.all-menus') ? 'active': ''}}" href="{{route('sa.all-menus')}}">
                            <i class="nav-main-link-icon fa fa-book-reader"></i>
                            <span class="nav-main-link-name">All Menus</span>
                        </a>
                    </li>

                    <li class="nav-main-heading">Inventory</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link">
                            <i class="nav-main-link-icon fa fa-file-circle-plus"></i>
                            <span class="nav-main-link-name">New</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link">
                            <i class="nav-main-link-icon fa fa-list-alt"></i>
                            <span class="nav-main-link-name">List</span>
                        </a>
                    </li>

                    <li class="nav-main-heading">Orders</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{url()->current() == route('sa.new-order') ? 'active': ''}}" href="{{route('sa.new-order')}}">
                            <i class="nav-main-link-icon fa fa-bowl-food"></i>
                            <span class="nav-main-link-name">New</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{url()->current() == route('sa.orders-list') ? 'active': ''}}" href="{{route('sa.orders-list')}}">
                            <i class="nav-main-link-icon fa fa-list-alt"></i>
                            <span class="nav-main-link-name">List</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link">
                            <i class="nav-main-link-icon fa fa-cash-register"></i>
                            <span class="nav-main-link-name">Sales</span>
                        </a>
                    </li>

                    <li class="nav-main-heading">Users</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{url()->current() == route('sa.new-user') ? 'active': ''}}" href="/super-admin/new-user">
                            <i class="nav-main-link-icon fa fa-user-plus"></i>
                            <span class="nav-main-link-name">New User</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{url()->current() == route('sa.all-users') ? 'active': ''}}" href="/super-admin/all-users">
                            <i class="nav-main-link-icon fa fa-users-line"></i>
                            <span class="nav-main-link-name">List</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </div>
    <!-- Sidebar Content -->
</nav>
