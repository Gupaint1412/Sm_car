@extends('layouts.main_template')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">You are admin user.</h1>                        
            @php                
                $data_chart_count_smcar_owner = array();
                $data_chart_count_machine_owner = array();
                $data_chart_count_truck_owner = array();
                $data_chart_count_general_work_owner = array();
                foreach ($data['data_car_count_owner'] as $i => $j){
                  $data_chart_count_smcar_owner[] = $j;
                }
                foreach ($data['data_machine_count_owner'] as $i => $j){
                  $data_chart_count_machine_owner[] = $j;
                }
                foreach ($data['data_truck_count_owner'] as $i => $j){
                  $data_chart_count_truck_owner[] = $j;
                }
                foreach ($data['data_general_work_count_owner'] as $i => $j){
                  $data_chart_count_general_work_owner[] = $j;
                }
            @endphp

            {{-- @php
                echo gettype($data['data_car_owner'])."<br>";
                echo gettype($data_chart_smcar_owner)."<br>";
                echo gettype($data_chart_count_smcar_owner)."<br>";
                foreach ($data_chart_smcar_owner as $k => $v){
                echo ($v->owner)."<br>"."///";
              }            
            @endphp --}}
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $data['count_smcar'] }}</h3>
                <p>Cars Database</p>
              </div>
              <div class="icon">
                <i class="fa fa-car"></i>
              </div>
              <a href="{{ route('admin.car') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $data['count_machine'] }}</h3>
  
                <p>Machines Database</p>
              </div>
              <div class="icon">
                <svg class="w3-animate-zoom" style="top:15px" version="1.0" xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                  <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="rgba(0,0,0,.15)" stroke="none">
                      <path d="M3058 4310 c-113 -19 -248 -119 -290 -215 -21 -46 -171 -587 -192
                      -690 -18 -89 -36 -240 -44 -378 l-7 -108 -450 311 -450 311 -12 66 c-26 138
                      -117 258 -242 316 -85 40 -217 50 -302 22 -201 -66 -326 -255 -304 -461 l6
                      -61 -229 -354 c-268 -415 -324 -509 -402 -672 -90 -190 -140 -359 -140 -476 0
                      -119 84 -272 204 -373 186 -156 508 -257 826 -259 120 -1 163 12 204 61 51 61
                      36 107 -90 270 -188 243 -287 410 -330 552 -24 83 -70 335 -80 447 l-6 66 142
                      220 c78 121 145 223 149 228 4 4 27 0 51 -8 53 -19 170 -21 231 -5 50 14 116
                      45 141 67 10 9 24 13 33 9 9 -3 240 -160 513 -349 273 -189 507 -349 520 -356
                      18 -10 22 -20 22 -61 0 -139 109 -269 251 -300 39 -8 262 -10 824 -8 765 3
                      770 3 817 25 99 46 168 135 188 246 7 35 10 344 8 864 l-3 808 -26 56 c-50
                      106 -135 170 -250 189 -75 12 -1209 12 -1281 0z m1213 -293 c67 -44 69 -57 69
                      -391 0 -278 -1 -303 -20 -341 -38 -78 -10 -75 -619 -75 -298 0 -541 1 -541 3
                      0 2 16 43 36 92 39 96 40 131 8 180 -37 57 -126 74 -188 35 -33 -20 -54 -58
                      -132 -245 -15 -37 -17 -38 -30 -20 -8 10 -14 32 -14 49 0 16 34 163 75 325 83
                      323 95 352 168 389 42 22 47 22 598 22 l556 0 34 -23z m-3005 -333 c97 -46
                      118 -182 40 -260 -78 -78 -214 -57 -260 40 -67 141 79 287 220 220z"></path>
                      <path d="M2549 1950 c-245 -27 -416 -172 -473 -401 -21 -85 -21 -252 0 -338
                      48 -196 184 -333 386 -389 58 -16 147 -17 1128 -17 1000 0 1069 1 1129 18 192
                      55 315 172 373 357 19 63 23 95 22 205 0 114 -4 140 -27 208 -64 184 -175 286
                      -372 344 -55 16 -142 17 -1075 19 -558 1 -1049 -2 -1091 -6z m2102 -244 c158
                      -37 229 -138 229 -326 0 -161 -45 -247 -158 -302 l-67 -33 -1035 -3 c-1114 -3
                      -1112 -3 -1194 48 -91 58 -129 144 -129 290 0 184 66 285 213 324 78 21 2054
                      23 2141 2z"></path>
                      <path d="M2780 1564 c-162 -70 -160 -301 2 -369 148 -61 305 78 264 236 -30
                      115 -159 179 -266 133z"></path>
                      <path d="M3517 1565 c-76 -27 -127 -101 -127 -185 0 -176 205 -264 333 -142
                      43 41 60 81 60 142 0 140 -133 233 -266 185z"></path>
                      <path d="M4257 1570 c-112 -34 -169 -173 -114 -280 85 -170 337 -129 372 61
                      25 136 -121 260 -258 219z"></path>
                  </g>
                </svg>
              </div>
              <a href="{{ route('admin.machine') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $data['count_truck'] }}</h3>
  
                <p>Trucks Database</p>
              </div>
              <div class="icon">
                <i class="bi bi-truck" style="font-weight: 900;position: absolute;right:15px;font-size:70px;top:5px"></i>
              </div>
              <a href="{{ route('admin.truck') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $data['count_general'] }}</h3>
  
                <p>General Database</p>
              </div>
              <div class="icon">
                <i class="bi bi-tools"style="font-weight: 900;position: absolute;right:15px;font-size:60px;top:10px"></i>
              </div>
              <a href="{{ route('admin.general') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">ฐานข้อมูลรถยนต์ส่วนกลาง</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                {{-- <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> --}}
                <canvas id="myChart_smcar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">ฐานข้อมูลเครื่องจักร</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="myChart_machine" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">ฐานข้อมูลรถบรรทุก</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                {{-- <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> --}}
                <canvas id="myChart_truck" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">ฐานข้อมูลเครื่องมือทั่วไป</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                {{-- <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> --}}
                <canvas id="myChart_general_work" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>                  
          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">                
                <canvas id="myChart_smcar_type" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">                
                <canvas id="myChart_machine_bar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">                
                <canvas id="myChart_truck_bar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">                
                <canvas id="myChart_general_work_bar" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>    
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
