<x-app-header/>
<!-- Page Container -->
<div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-glass page-header-fixed side-trans-enabled page-header-scroll">
{{--                                enable-page-overlay side-scroll sidebar-o side-trans-enabled page-header-fixed page-header-glass page-header-scroll--}}
    <!-- Side Overlay-->
    <x-side-overlay/>
    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <x-sidebar/>
    <!-- END Sidebar -->

    <!-- Header -->
    <x-header/>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <x-hero/>
        <!-- END Hero -->

        <!-- Breadcrumb -->
        <x-breadcrumb/>
        <!-- END Breadcrumb -->

        <!-- Page Content -->
        @yield('content')
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <x-footer/>
    <!-- END Footer -->
</div>
<!-- END Page Container -->
<x-app-footer/>
