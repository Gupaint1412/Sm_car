@extends('layouts.no_chart_template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12 d-flex align-items-center" style="justify-content:space-between">
          <div class="d-flex">
            <a href="{{route('users.home')}}" class="btn btn-dark" style="margin-right: 2rem"><i class='bx bx-left-arrow'style="margin-right:.3rem;"></i>ย้อนกลับ</a>
            <a href="{{ route('users.addTruck' )}}" class="btn btn-success"><i class="bi bi-plus-lg" style="margin-right:.3rem;"></i>เพิ่มข้อมูลใหม่</a>
          </div>                                   
          <h4 style="margin-bottom:0"><i class="bx bxs-truck" style="padding-right:5px;color:#ffc107"></i>รายการทั้งหมด {{$data['count_truck']}} รายการ</h4>
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
                @foreach ($data['truck'] as $items=>$k)                                                    
                <tr style="text-align:center">
                  <td style="padding:12px"> {{$items+1}} </td>
                  <td> {{$k->brand}} </td>                  
                  <td> {{$k->type}} </td>
                  <td> {{$k->license}} </td>
                  <td> {{$k->code_machine}} </td>                 
                  <td> {{$k->owner}} </td>
                  <td style="padding: 12px">
                    <a href="{{route('users.showTruck',$k->id)}}" class="btn btn-info"style="margin-right:.25rem;font-size:12px"><i class="bi bi-search"></i></a>
                    <a href="{{route('users.editTruck',$k->id)}}" class="btn btn-warning"style="margin-right:.25rem;font-size:12px"><i class="bi bi-pencil-square"></i></a>                    
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