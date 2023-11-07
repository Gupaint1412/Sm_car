<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Shortcut Icon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('/logo/logo_pao.png') }}">
    {{-- Theme Style Adminlte CSS --}}
    <link rel="stylesheet" href="{{ asset('/adminlte/css/adminlte.min.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    {{-- SweetAlert --}}
    <link rel="stylesheet" href="{{ asset('/sweetalert2/sweetalert2.min.css') }}">
    {{-- ChartJS --}}
    <link rel="stylesheet" href="{{ asset('/chart.js/Chart.min.css') }}">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="{{ asset('/bootstrap_icon/font/bootstrap-icons.min.css') }}">
    {{-- Thai Font --}}
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    {{-- Mofify Css --}}
    <link rel="stylesheet" href="{{ asset('/modify_css/style.css') }}">
    {{-- DataTables --}}
    <link rel="stylesheet" href="{{ asset('/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    {{-- Boxicons --}}
    <link rel="stylesheet" href="{{ asset('/boxicons/css/boxicons.min.css') }}"> 
    {{-- OwlCarousel --}}
    <link rel="stylesheet" href="{{ asset('/OwlCarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/OwlCarousel/dist/assets/owl.theme.default.min.css') }}">    
    <title>ข้อมูลรถยนต์ส่วนกลาง</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
      @include('layouts.navbar')
      @include('layouts.sidebar')
      @yield('content')
      @include('layouts.footer')
  </div>
  {{-- jQuery --}}
  <script src="{{ asset('/jquery/jquery.min.js')}}"></script>  
  {{-- ChartJS --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
  {{-- Theme Style Adminlte JS --}}
  <script src="{{ asset('/adminlte/js/adminlte.min.js')}}"></script>
  {{-- overlayScrollbars --}}
  <script src="{{ asset('/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  {{-- SweetAlert --}}
  <script src="{{ asset('/sweetalert2/sweetalert2.all.min.js')}}"></script>
  {{-- Bootstrap Js --}}
  <script src="{{ asset('/bootstrap/js/bootstrap.min.js')}}"></script>
  {{-- Test Chart Data --}}
  <script src="{{ asset('/chart.js/dashboard.js')}}"></script>
  {{-- Modify Script --}}
  <script type="text/javascript" src="{{asset('/modify_js/script.js')}}"></script>
  {{-- Boxicons Script --}}
  <script type="text/javascript" src="{{asset('/boxicons/dist/boxicons.js')}}"></script>
  {{-- DataTable  --}}
  <script type="text/javascript" src="{{asset('/datatables/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/jszip/jszip.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/pdfmake/pdfmake.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/pdfmake/vfs_fonts.js')}}"></script>
  <script type="text/javascript" src="{{asset('/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  @include('DataTable.table')
  {{-- OwlCarousel --}}
  <script type="text/javascript" src="{{asset('/OwlCarousel/dist/owl.carousel.min.js')}}"></script>
  @include('Owl_carousel.owl_carousel')      
  
</body>
</html>