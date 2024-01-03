@extends('layouts.no_chart_template')
@section('content')
<div class="content-wrapper">
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
                @php $i = 0 @endphp
                @foreach ($data['smcar'] as $items=>$k)                                                    
                    <tr style="text-align:center">
                        <td style="padding:12px"> {{$i+1}} </td>
                        <td> {{$k->brand}} </td>                  
                        <td> {{$k->type}} </td>
                        <td> {{$k->license}} </td>
                        <td> {{$k->code_machine}} </td>                 
                        <td> {{$k->owner}} </td>
                        <td style="padding: 12px">
                            <a href="{{route('users.expireCar',$k->id)}}" class="btn btn-info"style="margin-right:.25rem;font-size:12px"><i class="bi bi-search"></i></a>
                            @if( Auth::user()->agency == 'กองพัสดุ' || Auth::user()->agency == '' || Auth::user()->agency == null )
                              {{-- <a href="{{route('users.clearCar',$k->id)}}" class="btn btn-danger"style="margin-right:.25rem;font-size:12px"><i class="bi bi-check2-square"></i></a> --}}
                              <a href="#" data-toggle="modal" data-target="#ClearCar_{{$k->id}}" data-action="{{ route('users.clearCar',$k->id) }}" class="btn btn-danger"style="margin-right:.25rem;font-size:12px"><i class="bi bi-check2-square"></i></a>
                            @endif
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="ClearCar_{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header  bg bg-danger">
                            <h5 class="modal-title" id="exampleModalLongTitle"><i class="bi bi-exclamation-octagon" style="padding-right:.3rem"></i>คุณต้องการที่จะจำหน่ายรถยนต์</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{ route('users.clearCar',$k->id) }}" method="post">
                            @csrf
                            <div class="modal-body">                              
                              <div class="d-flex">                                
                                <div style="margin-left: auto;margin-right:auto"><p style="margin:0"><b>ยี่ห้อ:</b> &nbsp;&nbsp;&nbsp;{{ $k->brand }} </p><p style="margin:0"><b>แบบชนิด:</b> &nbsp;&nbsp;&nbsp;{{ $k->type }}</p></div>    
                                <div style="margin-left: auto;margin-right:auto"><p style="margin:0"><b>ทะเบียน:</b> &nbsp;&nbsp;&nbsp;{{ $k->license }} </p><p style="margin:0"><b>รหัส:</b> &nbsp;&nbsp;&nbsp;{{ $k->code_machine }}</p></div>
                              </div>
                            </div>                       
                            <div class="modal-footer" style="justify-content:space-between">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                              <button type="submit" class="btn btn-dark">ยืนยันลบข้อมูล</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    @php $i++ @endphp
                        @foreach ($data['machine'] as $items=>$m)                                                    
                            <tr style="text-align:center">
                                <td style="padding:12px"> {{$i+1}} </td>
                                <td> {{$m->brand}} </td>                  
                                <td> {{$m->type}} </td>
                                <td> {{$m->license}} </td>
                                <td> {{$m->code_machine}} </td>                 
                                <td> {{$m->owner}} </td>
                                <td style="padding: 12px">
                                    <a href="{{route('users.expireMachine',$m->id)}}" class="btn btn-info"style="margin-right:.25rem;font-size:12px"><i class="bi bi-search"></i></a>
                                    @if( Auth::user()->agency == 'กองพัสดุ' || Auth::user()->agency == '' || Auth::user()->agency == null )
                                      {{-- <a href="{{route('users.clearMachine',$m->id)}}" class="btn btn-danger"style="margin-right:.25rem;font-size:12px"><i class="bi bi-check2-square"></i></a> --}}
                                      <a href="#" data-toggle="modal" data-target="#ClearMachine_{{$m->id}}" data-action="{{ route('users.clearMachine',$m->id) }}" class="btn btn-danger" style="margin-right:.25rem;font-size:12px"><i class="bi bi-check2-square"></i></a>
                                    @endif
                                </td>
                            </tr> 
                            <!-- Modal -->
                            <div class="modal fade" id="ClearMachine_{{$m->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header  bg bg-danger">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="bi bi-exclamation-octagon" style="padding-right:.3rem"></i>คุณต้องการที่จะจำหน่ายเครื่องจักร</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form action="{{ route('users.clearMachine',$m->id) }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                      <div class="d-flex">
                                        <div style="margin-left: auto;margin-right:auto"><p style="margin:0"><b>ยี่ห้อ:</b> &nbsp;&nbsp;&nbsp;{{ $k->brand }} </p><p style="margin:0"><b>แบบชนิด:</b> &nbsp;&nbsp;&nbsp;{{ $k->type }}</p></div>    
                                        <div style="margin-left: auto;margin-right:auto"><p style="margin:0"><b>ทะเบียน:</b> &nbsp;&nbsp;&nbsp;{{ $k->license }} </p><p style="margin:0"><b>รหัส:</b> &nbsp;&nbsp;&nbsp;{{ $k->code_machine }}</p></div>
                                      </div>
                                    </div>                       
                                    <div class="modal-footer" style="justify-content:space-between">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                      <button type="submit" class="btn btn-dark">ยืนยันลบข้อมูล</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            @php $i++ @endphp
                                @foreach ($data['truck'] as $items=>$t)                                                    
                                    <tr style="text-align:center">
                                        <td style="padding:12px"> {{$i+1}} </td>
                                        <td> {{$t->brand}} </td>                  
                                        <td> {{$t->type}} </td>
                                        <td> {{$t->license}} </td>
                                        <td> {{$t->code_machine}} </td>                 
                                        <td> {{$t->owner}} </td>
                                        <td style="padding: 12px">
                                            <a href="{{route('users.expireTruck',$t->id)}}" class="btn btn-info"style="margin-right:.25rem;font-size:12px"><i class="bi bi-search"></i></a>
                                            @if( Auth::user()->agency == 'กองพัสดุ' || Auth::user()->agency == '' || Auth::user()->agency == null )
                                              {{-- <a href="{{route('users.clearTruck',$t->id)}}" class="btn btn-danger"style="margin-right:.25rem;font-size:12px"><i class="bi bi-check2-square"></i></a> --}}
                                              <a href="#" data-toggle="modal" data-target="#ClearTruck_{{$t->id}}" data-action="{{ route('users.clearTruck',$t->id) }}" class="btn btn-danger" style="margin-right:.25rem;font-size:12px"><i class="bi bi-check2-square"></i></a>
                                            @endif
                                        </td>
                                    </tr> 
                                    <!-- Modal -->
                                    <div class="modal fade" id="ClearTruck_{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header  bg bg-danger">
                                            <h5 class="modal-title" id="exampleModalLongTitle"><i class="bi bi-exclamation-octagon" style="padding-right:.3rem"></i>คุณต้องการจำหน่ายรถบรรทุก</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form action="{{ route('users.clearTruck',$t->id) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                              <div class="d-flex">
                                                <div style="margin-left: auto;margin-right:auto"><p style="margin:0"><b>ยี่ห้อ:</b> &nbsp;&nbsp;&nbsp;{{ $k->brand }} </p><p style="margin:0"><b>แบบชนิด:</b> &nbsp;&nbsp;&nbsp;{{ $k->type }}</p></div>    
                                                <div style="margin-left: auto;margin-right:auto"><p style="margin:0"><b>ทะเบียน:</b> &nbsp;&nbsp;&nbsp;{{ $k->license }} </p><p style="margin:0"><b>รหัส:</b> &nbsp;&nbsp;&nbsp;{{ $k->code_machine }}</p></div>
                                              </div>
                                            </div>                       
                                            <div class="modal-footer" style="justify-content:space-between">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                              <button type="submit" class="btn btn-dark">ยืนยันลบข้อมูล</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                    @php $i++ @endphp 
                                        @foreach ($data['general'] as $items=>$g)                                                    
                                            <tr style="text-align:center">
                                                <td style="padding:12px"> {{$i+1}} </td>
                                                <td> {{$g->brand}} </td>                  
                                                <td> {{$g->type}} </td>
                                                <td> {{$g->license}} </td>
                                                <td> {{$g->code_machine}} </td>                 
                                                <td> {{$g->owner}} </td>
                                                <td style="padding: 12px">
                                                    <a href="{{route('users.expireGeneral',$g->id)}}" class="btn btn-info"style="margin-right:.25rem;font-size:12px"><i class="bi bi-search"></i></a>
                                                    @if( Auth::user()->agency == 'กองพัสดุ' || Auth::user()->agency == '' || Auth::user()->agency == null )
                                                      {{-- <a href="{{route('users.clearGeneral',$g->id)}}" class="btn btn-danger"style="margin-right:.25rem;font-size:12px"><i class="bi bi-check2-square"></i></a> --}}
                                                      <a href="#" data-toggle="modal" data-target="#ClearGeneral_{{$g->id}}" data-action="{{ route('users.clearGeneral',$g->id) }}" class="btn btn-danger" style="margin-right:.25rem;font-size:12px"><i class="bi bi-check2-square"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="ClearGeneral_{{$g->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header  bg bg-danger">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="bi bi-exclamation-octagon" style="padding-right:.3rem"></i>คุณต้องการจำหน่ายเครื่องใช้ทั่วไป</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <form action="{{ route('users.clearGeneral',$g->id) }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                      <div class="d-flex">
                                                        <div style="margin-left: auto;margin-right:auto"><p style="margin:0"><b>ยี่ห้อ:</b> &nbsp;&nbsp;&nbsp;{{ $k->brand }} </p><p style="margin:0"><b>แบบชนิด:</b> &nbsp;&nbsp;&nbsp;{{ $k->type }}</p></div>    
                                                        <div style="margin-left: auto;margin-right:auto"><p style="margin:0"><b>ทะเบียน:</b> &nbsp;&nbsp;&nbsp;{{ $k->license }} </p><p style="margin:0"><b>รหัส:</b> &nbsp;&nbsp;&nbsp;{{ $k->code_machine }}</p></div>
                                                      </div>
                                                    </div>                       
                                                    <div class="modal-footer" style="justify-content:space-between">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                                      <button type="submit" class="btn btn-dark">ยืนยันลบข้อมูล</button>
                                                    </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                            @php $i++ @endphp                                                                                         
                                        @endforeach                                                   
                                @endforeach                                                    
                        @endforeach                           
                @endforeach
              </tbody>
            </table>
          </div>
        </div>      
    </div><!-- /.container-fluid -->
  </section>
</div>
@endsection