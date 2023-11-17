@extends('layouts.no_chart_template')
@section('content')    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12 d-flex align-items-center" style="justify-content:space-between">   
                <div class="d-flex">                       
                    <a href="{{ route('users.general') }}" class="btn btn-secondary d-flex align-items-center"><i class='bx bxs-left-arrow' style="padding-right:.25rem;"></i>ย้อนกลับ</a>
                    <a href="{{ route('users.editGeneral',$general->id) }}" class="btn btn-warning" style="margin-left:2rem"><i class="bi bi-pencil-square"style="padding-right:.25rem;"></i>แก้ไขข้อมูล</a>
                </div>
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
                    <div class="card mb-3">                      
                          @if($general->path_img == '')
                            <div style="height: 300px;width:450px;margin-left:auto;margin-right:auto">
                                <img class="card-img-top" src=" {{asset('/img/pao.jpg')}}" alt="Card image cap" style="max-height: 100%">
                            </div>
                            @else
                            <div class="owl-carousel owl-theme">                               
                              @foreach(explode('|',$general->path_img) as $path)                                
                                <div class="item">
                                  <img src="{{asset($path)}}" style="height:350px">
                                </div>
                              @endforeach                              
                            </div>                                                     
                          @endif                     
                        <div class="card-body">
                          {{-- <h5 class="card-title">Card title</h5> --}}
                          <div class="row">
                            <div class="col-md-6 col-sm-6" style="text-align:end">
                                <h5>ยี่ห้อ :</h5>                               
                                <h5>โมเดล :</h5>
                                <h5>ประเภทรถ :</h5>
                                <h5>ทะเบียน :</h5>
                                <h5>รหัสรถยนต์ :</h5>
                                <h5>แรงม้า :</h5>
                                <h5>ปีที่จัดซื้อ :</h5>
                                <h5>ราคา :</h5>
                                <h5>หน่วยงานที่ใช้งาน :</h5>
                                <h5>ผู้รับผิดชอบ :</h5>
                                <h5>เบอร์โทรศัพท์ :</h5>
                                <h5>หมายเหตุ :</h5>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <h5> @if($general->brand == '') - @else {{$general->brand}} @endif </h5>                                            
                                <h5> @if($general->model == '') - @else {{$general->model}} @endif </h5>                                                                                                                                                                                                                          
                                <h5> @if($general->type == '') - @else {{$general->type}} @endif</h5>
                                <h5> @if($general->license == '') - @else {{$general->license}} @endif</h5>
                                <h5> @if($general->code_machine == '') - @else {{$general->code_machine}} @endif</h5>
                                <h5> @if($general->hp_kw == '') - @else {{$general->hp_kw}} @endif</h5>
                                <h5> @if($general->year == '') - @else {{$general->year}} @endif</h5>
                                <h5> @if($general->budget == '') - @else {{$general->budget}} บาท @endif</h5>
                                <h5> @if($general->owner == '') - @else {{$general->owner}} @endif</h5>
                                <h5> @if($general->responsible_person == '') - @else {{$general->responsible_person}} @endif</h5>
                                <h5> @if($general->phone == '') - @else {{$general->phone}} @endif</h5>
                                <h5> @if($general->note == '') - @else {{$general->note}} @endif</h5>                                                                
                            </div>
                          </div>
                          {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                        </div>
                    </div>
                </div>
            </div>     
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
    
@endsection