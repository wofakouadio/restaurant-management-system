@extends('layouts/admin-app')
@push('title') <title>Administrator | Restaurant Management System</title> @endpush
@section('content')
    <div class="content">
        <!-- Statistics -->
        <div class="content-heading d-flex justify-content-between align-items-center">
            <span>
              Statistics <small class="d-none d-sm-inline">Awesome!</small>
            </span>
            <div class="dropdown">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="ecom-dashboard-stats-drop" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>Today</span>
                    <i class="fa fa-angle-down ms-1 opacity-50"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="ecom-dashboard-stats-drop">
                    <a class="dropdown-item active" href="javascript:void(0)">
                        <i class="fa fa-fw fa-calendar-alt opacity-50 me-1"></i> Today
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="fa fa-fw fa-calendar-alt opacity-50 me-1"></i> This Week
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="fa fa-fw fa-calendar-alt opacity-50 me-1"></i> This Month
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="fa fa-fw fa-calendar-alt opacity-50 me-1"></i> This Year
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="far fa-fw fa-circle opacity-50 me-1"></i> All Time
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Earnings -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-transparent bg-gd-elegance" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-chart-area text-white-75"></i>
                            </div>
                        </div>
                        <div class="py-3 text-center">
                            <div class="fs-2 fw-bold mb-0 text-white">$2420</div>
                            <div class="fs-sm fw-semibold text-uppercase text-white-75">Earnings</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Earnings -->

            <!-- Orders -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-transparent bg-gd-dusk" href="be_pages_ecom_orders.html">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-archive text-white-75"></i>
                            </div>
                        </div>
                        <div class="py-3 text-center">
                            <div class="fs-2 fw-bold mb-0 text-white">35</div>
                            <div class="fs-sm fw-semibold text-uppercase text-white-75">Orders</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Orders -->

            <!-- New Customers -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-transparent bg-gd-sea" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-users text-white-75"></i>
                            </div>
                        </div>
                        <div class="py-3 text-center">
                            <div class="fs-2 fw-bold mb-0 text-white">15</div>
                            <div class="fs-sm fw-semibold text-uppercase text-white-75">New Customers</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END New Customers -->

            <!-- Conversion Rate -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-transparent bg-gd-aqua" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-cart-arrow-down text-white-75"></i>
                            </div>
                        </div>
                        <div class="py-3 text-center">
                            <div class="fs-2 fw-bold mb-0 text-white">5.6%</div>
                            <div class="fs-sm fw-semibold text-uppercase text-white-75">Conversion</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Conversion Rate -->
        </div>
        <!-- END Statistics -->

        <!-- Orders Overview -->
        <div class="content-heading d-flex justify-content-between align-items-center">
            <span>
              Orders <small class="d-none d-sm-inline">Overview</small>
            </span>
            <div class="dropdown">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="ecom-orders-overview-drop" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>This week</span>
                    <i class="fa fa-angle-down ms-1 opacity-50"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="ecom-orders-overview-drop">
                    <a class="dropdown-item active" href="javascript:void(0)">
                        <i class="fa fa-fw fa-calendar-alt opacity-50 me-1"></i> This Week
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="fa fa-fw fa-calendar-alt opacity-50 me-1"></i> This Month
                    </a>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="fa fa-fw fa-calendar-alt opacity-50 me-1"></i> This Year
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:void(0)">
                        <i class="far fa-fw fa-circle opacity-50 me-1"></i> All Time
                    </a>
                </div>
            </div>
        </div>

        <!-- Chart.js Chart functionality is initialized in js/pages/be_pages_ecom_dashboard.min.js which was auto compiled from _js/pages/be_pages_ecom_dashboard.js -->
        <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
        <div class="row">
            <!-- Orders Earnings Chart -->
            <div class="col-md-6">
                <div class="block block-rounded block-mode-loading-refresh">
                    <div class="block-header">
                        <h3 class="block-title">
                            Earnings
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full bg-body-light text-center">
                        <div class="row g-sm">
                            <div class="col-4">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">All</div>
                                <div class="fs-3 fw-semibold">$9,587</div>
                            </div>
                            <div class="col-4">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Profit</div>
                                <div class="fs-3 fw-semibold text-success">$8,087</div>
                            </div>
                            <div class="col-4">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Expenses</div>
                                <div class="fs-3 fw-semibold text-danger">$1,500</div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull">
                            <!-- Earnings Chart Container -->
                            <canvas id="js-chartjs-ecom-dashboard-earnings" style="height: 290px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Orders Earnings Chart -->

            <!-- Orders Volume Chart -->
            <div class="col-md-6">
                <div class="block block-rounded block-mode-loading-refresh">
                    <div class="block-header">
                        <h3 class="block-title">
                            Volume
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full bg-body-light text-center">
                        <div class="row g-sm">
                            <div class="col-4">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">All</div>
                                <div class="fs-3 fw-semibold">183</div>
                            </div>
                            <div class="col-4">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Completed</div>
                                <div class="fs-3 fw-semibold text-success">175</div>
                            </div>
                            <div class="col-4">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Canceled</div>
                                <div class="fs-3 fw-semibold text-danger">8</div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull">
                            <!-- Orders Chart Container -->
                            <canvas id="js-chartjs-ecom-dashboard-orders" style="height: 290px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Orders Volume Chart -->
        </div>
        <!-- END Orders Overview -->

        <!-- Latest Orders and Top Products -->
        <div class="row">
            <!-- Latest Orders -->
            <div class="col-xl-6">
                <h2 class="content-heading">Latest Orders</h2>
                <div class="block block-rounded">
                    <div class="block-content block-content-full">
                        <table class="table table-borderless table-striped mb-0">
                            <thead>
                            <tr>
                                <th style="width: 100px;">ID</th>
                                <th>Status</th>
                                <th class="d-none d-sm-table-cell">Customer</th>
                                <th class="d-none d-sm-table-cell text-end">Value</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1851</a>
                                </td>
                                <td>
                                    <span class="badge bg-danger">Canceled</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a href="be_pages_ecom_customer.html">Barbara Scott</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">$574</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1850</a>
                                </td>
                                <td>
                                    <span class="badge bg-success">Completed</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a href="be_pages_ecom_customer.html">Carol White</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">$472</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1849</a>
                                </td>
                                <td>
                                    <span class="badge bg-danger">Canceled</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a href="be_pages_ecom_customer.html">Thomas Riley</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">$602</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1848</a>
                                </td>
                                <td>
                                    <span class="badge bg-warning">Pending</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a href="be_pages_ecom_customer.html">Lori Grant</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">$485</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1847</a>
                                </td>
                                <td>
                                    <span class="badge bg-info">Processing</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a href="be_pages_ecom_customer.html">Jack Estrada</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">$247</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1846</a>
                                </td>
                                <td>
                                    <span class="badge bg-danger">Canceled</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a href="be_pages_ecom_customer.html">Lori Moore</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">$108</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1845</a>
                                </td>
                                <td>
                                    <span class="badge bg-success">Completed</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a href="be_pages_ecom_customer.html">Wayne Garcia</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">$134</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1844</a>
                                </td>
                                <td>
                                    <span class="badge bg-info">Processing</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a href="be_pages_ecom_customer.html">Amber Harvey</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">$794</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1843</a>
                                </td>
                                <td>
                                    <span class="badge bg-danger">Canceled</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a href="be_pages_ecom_customer.html">Lisa Jenkins</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">$204</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="fw-semibold" href="be_pages_ecom_order.html">ORD.1842</a>
                                </td>
                                <td>
                                    <span class="badge bg-warning">Pending</span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a href="be_pages_ecom_customer.html">Megan Fuller</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end">$653</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Latest Orders -->

            <!-- Top Products -->
            <div class="col-xl-6">
                <h2 class="content-heading">Top Products</h2>
                <div class="block block-rounded">
                    <div class="block-content block-content-full">
                        <table class="table table-borderless table-striped mb-0">
                            <thead>
                            <tr>
                                <th class="d-none d-sm-table-cell" style="width: 100px;">ID</th>
                                <th>Product</th>
                                <th class="text-center">Orders</th>
                                <th class="d-none d-sm-table-cell text-center">Rating</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.258</a>
                                </td>
                                <td>
                                    <a href="be_pages_ecom_product_edit.html">Dark Souls III</a>
                                </td>
                                <td class="text-center">
                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">912</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.198</a>
                                </td>
                                <td>
                                    <a href="be_pages_ecom_product_edit.html">Bioshock Collection</a>
                                </td>
                                <td class="text-center">
                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">895</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.852</a>
                                </td>
                                <td>
                                    <a href="be_pages_ecom_product_edit.html">Alien Isolation</a>
                                </td>
                                <td class="text-center">
                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">820</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.741</a>
                                </td>
                                <td>
                                    <a href="be_pages_ecom_product_edit.html">Bloodborne</a>
                                </td>
                                <td class="text-center">
                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">793</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.985</a>
                                </td>
                                <td>
                                    <a href="be_pages_ecom_product_edit.html">Forza Motorsport 7</a>
                                </td>
                                <td class="text-center">
                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">782</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.056</a>
                                </td>
                                <td>
                                    <a href="be_pages_ecom_product_edit.html">Fifa 18</a>
                                </td>
                                <td class="text-center">
                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">776</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.036</a>
                                </td>
                                <td>
                                    <a href="be_pages_ecom_product_edit.html">Gears of War 4</a>
                                </td>
                                <td class="text-center">
                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">680</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.682</a>
                                </td>
                                <td>
                                    <a href="be_pages_ecom_product_edit.html">Minecraft</a>
                                </td>
                                <td class="text-center">
                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">670</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.478</a>
                                </td>
                                <td>
                                    <a href="be_pages_ecom_product_edit.html">Dishonored 2</a>
                                </td>
                                <td class="text-center">
                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">640</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-semibold" href="be_pages_ecom_product_edit.html">PID.952</a>
                                </td>
                                <td>
                                    <a href="be_pages_ecom_product_edit.html">Gran Turismo Sport</a>
                                </td>
                                <td class="text-center">
                                    <a class="text-gray-dark" href="be_pages_ecom_orders.html">630</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Top Products -->
        </div>
        <!-- END Latest Orders and Top Products -->
    </div>
@endsection
