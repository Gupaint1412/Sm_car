@extends('layouts.no_chart_template')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12 d-flex align-items-center" style="justify-content:space-between">
          <a href="{{ route('admin.addCar' )}}" class="btn btn-success" style="margin-left: 1rem">เพิ่มข้อมูลใหม่</a>                          
          {{-- <a href="{{route('admin.home')}}">Home</a> --}}
        </div>
        {{-- <div class="col-sm-6" style="display: flex;align-items:center;justify-content:end">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>            
          </ol>
        </div> --}}
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
                  {{-- <th scope="col" width="170px">รุ่น</th> --}}
                  <th scope="col">แบบ/ชนิด</th>
                  <th scope="col">ทะเบียน</th>
                  <th scope="col">รหัส</th>
                  {{-- <th scope="col">ปีที่จัดซื้อ</th> --}}
                  <th scope="col">หน่วยงานที่ใช้งาน</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($smcar as $items=>$k)                                                    
                <tr style="text-align:center">
                  <td style="padding:12px"> {{$items+1}} </td>
                  <td> {{$k->brand}} </td>
                  {{-- <td> {{$k->model}} </td> --}}
                  <td> {{$k->type}} </td>
                  <td> {{$k->license}} </td>
                  <td> {{$k->code_machine}} </td>
                  {{-- <td> {{$k->year}} </td> --}}
                  <td> {{$k->owner}} </td>
                  <td style="padding: 12px">
                    <a href="#" class="btn btn-primary"style="margin-right:.25rem;font-size:12px"><i class="bi bi-search"></i></a>
                    <a href="{{route('admin.editCar',$k->id)}}" class="btn btn-warning"style="margin-right:.25rem;font-size:12px"><i class="bi bi-pencil-square"></i></a>
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