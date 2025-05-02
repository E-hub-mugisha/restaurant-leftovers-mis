<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | User Template</title>
    <link href="{{ asset('admin/assets/vendor/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/fontawesome/css/solid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/fontawesome/css/brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/datatables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/master.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/flagiconcss/css/flag-icon.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        @include('user.includes.sidebar')
        <div id="body" class="active">
            @include('user.includes.header')
            <div class="content">
                <!-- Page Content -->
                @yield('content')

            </div>
            
        </div>
    </div>
    <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chartsjs/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashboard-charts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/initiate-datatables.js') }}"></script>

    <!-- Toast Notifications -->
    <div aria-live="polite" aria-atomic="true" class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080;">
        @if(session('success'))
        <div class="toast align-items-center text-bg-success border-0 show" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="toast align-items-center text-bg-danger border-0 show" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
        @endif
    </div>

</body>

</html>