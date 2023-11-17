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
            <a href="{{ route('admin.addGeneral' )}}" class="btn btn-success"><i class="bi bi-plus-lg" style="margin-right:.3rem;"></i>เพิ่มข้อมูลใหม่</a>
          </div>                                   
          <h4 style="margin-bottom:0"><i class="bi bi-tools" style="padding-right:5px;color:#dc3545"></i>รายการทั้งหมด {{$data['count_general']}} รายการ</h4>
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
                @foreach ($data['general'] as $items=>$k)                                                    
                <tr style="text-align:center">
                  <td style="padding:12px"> {{$items+1}} </td>
                  <td> {{$k->brand}} </td>                  
                  <td> {{$k->type}} </td>
                  <td> {{$k->license}} </td>
                  <td> {{$k->code_machine}} </td>                 
                  <td> {{$k->owner}} </td>
                  <td style="padding: 12px">
                    <a href="{{route('admin.showGeneral',$k->id)}}" class="btn btn-dark"style="margin-right:.25rem;font-size:12px"><i class="bi bi-search"></i></a>
                    <a href="{{route('admin.editGeneral',$k->id)}}" class="btn btn-dark"style="margin-right:.25rem;font-size:12px"><i class="bi bi-pencil-square"></i></a>
                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter_{{$k->id}}" data-action="{{ route('admin.deleteGeneral', $k->id) }}" class="btn btn-danger"style="margin-right:.25rem;font-size:12px"><i class="bi bi-trash3"></i></a>
                  </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter_{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header  bg bg-danger">
                        <h5 class="modal-title" id="exampleModalLongTitle"><i class="bi bi-exclamation-octagon" style="padding-right:.3rem"></i>คุณต้องการที่จะลบข้อมูล</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('admin.deleteGeneral', $k->id) }}" method="post">
                        @csrf
                        <div class="modal-body">
                          <div class="d-flex">
                            <div style="margin-left: auto;margin-right:auto"><p style="margin:0"><b>ยี่ห้อ:</b> &nbsp;&nbsp;&nbsp;{{ $k->brand }} </p><p style="margin:0"><b>แบบชนิด:</b> &nbsp;&nbsp;&nbsp;{{ $k->type }}</p></div>    
                            <div style="margin-left: auto;margin-right:auto"><p style="margin:0"><b>ทะเบียน:</b> &nbsp;&nbsp;&nbsp;{{ $k->license }} </p><p style="margin:0"><b>รหัส:</b> &nbsp;&nbsp;&nbsp;{{ $k->code_machine }}</p></div>
                          </div>
                        </div>                       
                        <div class="modal-footer" style="justify-content:space-between">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                          <button type="submit" class="btn btn-primary">ยืนยันลบข้อมูล</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
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