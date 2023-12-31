@extends('layouts.no_chart_template')
@section('content')    
    <div class="content-wrapper">        
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12 d-flex align-items-center" style="justify-content:space-between">
                <div class="d-flex">                          
                  <a href="{{ route('users.expire') }}" class="btn btn-secondary d-flex align-items-center"><i class='bx bxs-left-arrow' style="padding-right:.25rem"></i>ย้อนกลับ</a>                   
                </div>
              </div>             
            </div>
          </div>
        </div>       
        <section class="content">
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">                      
                          @if($smcar->path_img == '')
                            <div style="height: 300px;width:450px;margin-left:auto;margin-right:auto">
                                <img class="card-img-top" src=" {{asset('/img/pao.jpg')}}" alt="Card image cap" style="max-height: 100%">
                            </div>
                            @else
                            <div class="owl-carousel owl-theme">                               
                              @foreach(explode('|',$smcar->path_img) as $path)                                
                                <div class="item">
                                  <img src="{{asset($path)}}" style="height:350px">
                                </div>
                              @endforeach                              
                            </div>                                                     
                          @endif                     
                        <div class="card-body">                          
                          <div class="row">
                            <div class="col-md-6 col-sm-6" style="text-align:end">
                                <h5>ยี่ห้อ :</h5>                               
                                <h5>โมเดล :</h5>
                                <h5>ประเภทรถ :</h5>
                                <h5>ทะเบียน :</h5>
                                <h5>รหัสรถยนต์ :</h5>
                                <h5>ปีที่จัดซื้อ :</h5>
                                <h5>ราคา :</h5>
                                <h5>หน่วยงานที่ใช้งาน :</h5>
                                <h5>ผู้รับผิดชอบ :</h5>
                                <h5>เบอร์โทรศัพท์ :</h5>
                                <h5>หมายเหตุ :</h5>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <h5> @if($smcar->brand == '') - @else {{$smcar->brand}} @endif </h5>                                            
                                <h5> @if($smcar->model == '') - @else {{$smcar->model}} @endif </h5>                                                                                                                                                                                                                          
                                <h5> @if($smcar->type == '') - @else {{$smcar->type}} @endif</h5>
                                <h5> @if($smcar->license == '') - @else {{$smcar->license}} @endif</h5>
                                <h5> @if($smcar->code_machine == '') - @else {{$smcar->code_machine}} @endif</h5>
                                <h5> @if($smcar->year == '') - @else {{$smcar->year}} @endif</h5>
                                <h5> @if($smcar->budget == '') - @else {{$smcar->budget}} บาท @endif</h5>
                                <h5> @if($smcar->owner == '') - @else {{$smcar->owner}} @endif</h5>
                                <h5> @if($smcar->responsible_person == '') - @else {{$smcar->responsible_person}} @endif</h5>
                                <h5> @if($smcar->phone == '') - @else {{$smcar->phone}} @endif</h5>
                                <h5> @if($smcar->note == '') - @else {{$smcar->note}} @endif</h5>                                                                
                            </div>
                          </div>                          
                        </div>
                    </div>
                </div>
            </div>     
          </div>
        </section>        
      </div>
    
@endsection