<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Active Restaurant</title>
    <link href="{{ asset('admin/assets/vendor/fontawesome/css/fontawesome.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/fontawesome/css/solid.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/fontawesome/css/brands.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/datatables/datatables.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/assets/css/master.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/flagiconcss/css/flag-icon.min.css') }}"
        rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        @include('admin.includes.sidebar')
        <div id="body" class="active">
            @include('admin.includes.header')
            <div class="content">
                <!-- Page Content -->
                @yield('content')

            </div>

        </div>
    </div>
    <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}">
    </script>
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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons extension -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <!-- JSZip and pdfmake for Excel and PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>


    <script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    text: 'Copy',
                    className: 'btn btn-secondary',
                    exportOptions: {
                        columns: ':not(:last-child)' // exclude last column
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    className: 'btn btn-success',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    className: 'btn btn-info',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    className: 'btn btn-danger',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    className: 'btn btn-primary',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                }
            ],
            paging: true,
            ordering: true,
            info: true,
            responsive: true
        });
    });
</script>

</body>

</html>
