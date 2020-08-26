<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Module Slo</title>
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- DataTables -->


    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/myStyle.css') }}">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
   <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js">
    <link href="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
    <link href="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js">
    <link href="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js">
    <link href="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet">
    {{-- Laravel Mix - CSS File --}}
    {{--
    <link rel="stylesheet" href="{{ mix('css/slo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    --}}
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>

</head>

<body class="sidebar-mini layout-fixed text-sm">

<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.topnavi')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('layouts.leftmenu')
    <!-- /.Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        {{--
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/slo.js') }}"></script>
        --}}
        @include("slo::layouts.header")
        @yield('content')

        {{-- Laravel Mix - JS File --}}
        {{--
        <script src="{{ mix('js/slo.js') }}"></script>
        --}}
    </div>

    @include('layouts.controlsidebar')
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('layouts.footer')
    <!-- /.Main Footer -->

</div>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

<!-- AdminLTE App -->

<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>


@yield('scripts');
</body>

</html>
