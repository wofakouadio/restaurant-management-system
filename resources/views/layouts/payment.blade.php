<x-app-header/>
<!-- Page Container -->
<div id="page-container" class="main-content-boxed">
    <!-- Main Container -->
    <main id="main-container">
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
