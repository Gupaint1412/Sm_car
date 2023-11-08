@extends('layouts.no_chart_template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12 d-flex align-items-center" style="justify-content:space-between">
            <div class="d-flex">
                <a href="{{route('admin.home')}}" class="btn btn-dark" style="margin-right: 2rem"><i class='bx bx-left-arrow'style="margin-right:.3rem;"></i>ย้อนกลับ</a>
                <a href="{{ route('admin.addMachine' )}}" class="btn btn-success"><i class="bi bi-plus-lg" style="margin-right:.3rem;"></i>เพิ่มข้อมูลใหม่</a>
            </div>                                   
            <h4 style="margin-bottom:0">
                <svg class="w3-animate-zoom" style="top:15px" version="1.0" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="rgba(0,0,0,1)" stroke="none">
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
                รายการทั้งหมด {{$data['count_machine']}} รายการ
            </h4>
        </div>        
      </div>
    </div>
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <table id="example1" class="table table-bordered table-hover m-0">
              <thead>
                <tr style="text-align:center">
                  <th scope="col" style="width:35px">ลำดับ</th>
                  <th scope="col">ยี่ห้อ</th>                  
                  <th scope="col">แบบ/ชนิด</th>
                  <th scope="col">ทะเบียน</th>
                  <th scope="col">รหัส</th>                  
                  <th scope="col">หน่วยงานที่ใช้งาน</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['machine'] as $items=>$k)                                                    
                <tr style="text-align:center">
                  <td style="padding:12px"> {{$items+1}} </td>
                  <td> {{$k->brand}} </td>                  
                  <td> {{$k->type}} </td>
                  <td> {{$k->license}} </td>
                  <td> {{$k->code_machine}} </td>                 
                  <td> {{$k->owner}} </td>
                  <td style="padding: 12px">
                    <a href="{{route('admin.showMachine',$k->id)}}" class="btn btn-dark"style="margin-right:.25rem;font-size:12px"><i class="bi bi-search"></i></a>
                    <a href="{{route('admin.editMachine',$k->id)}}" class="btn btn-dark"style="margin-right:.25rem;font-size:12px"><i class="bi bi-pencil-square"></i></a>
                    <a href="#" class="btn btn-danger"style="margin-right:.25rem;font-size:12px"><i class="bi bi-trash3"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>      
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection