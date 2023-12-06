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
    <link rel="stylesheet" href="{{ asset('/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    {{-- Toastr --}}
    <link rel="stylesheet" href="{{ asset('/toastr/toastr.min.css') }}">
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

<body >
    
      @yield('content')

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
  <script src="{{ asset('/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  {{-- Toastr --}}
  <script src="{{ asset('/toastr/toastr.min.js') }}"></script>
  {{-- Alert --}}
  @include('Alert.alert')
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
  <script>
    $(document).ready(function(){
        $('#idcard').on('keyup',function(){
        var data_idcard = document.getElementById('idcard').value;
            if($.trim($(this).val()) != '' && $(this).val().length == 13){
                id = $(this).val().replace(/-/g,"");
                var result = Script_checkID(id);            
                var btn_register = document.getElementById('btn_register');
                    if(result === false){
                        $('span.error').removeClass('true').text('เลขบัตรผิด');        
                        document.getElementById('btn_register').disabled = true;
                        
                    }                    
                    else{
                        $('span.error').addClass('true').text('เลขบัตรถูกต้อง');
                        document.getElementById('btn_register').disabled = false;
                    }
            }
            else if(data_idcard.length < 13){
                $('span.error').removeClass('true').text('ตัวเลขไม่ถึง 13 หลัก');        
                document.getElementById('btn_register').disabled = true;
            }
            else{
                $('span.error').removeClass('true').text('');        
            }
        })
    });

    function Script_checkID(id){
        if(id.substring(0,1)== 0) return false;
        if(id.length != 13) return false;
            for(i=0, sum=0; i < 12; i++)
                sum += parseFloat(id.charAt(i))*(13-i);
        if((11-sum%11)%10!=parseFloat(id.charAt(12))) return false;
            return true;
    }
  </script>
</body>
</html>