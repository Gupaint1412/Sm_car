@extends('layouts.no_chart_template')
@section('content')    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12 d-flex align-items-center" style="justify-content:space-between">                          
                <a href="{{ route('users.truck') }}" class="btn btn-secondary d-flex align-items-center"><i class='bx bxs-left-arrow' style="padding-right:.25rem"></i>ย้อนกลับ</a>
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
                    <div class="card">
                        <div class="card-header bg bg-warning d-flex align-items-center" style="justify-content: space-between">
                            <div class="box"><i class="bi bi-pencil-square" style="padding-right:.5rem"></i>แก้ไขข้อมูลรถบรรทุก</div>
                            <i class='bi bi-truck' style="margin-left: auto;font-size:20px"></i>
                        </div>
                        <div class="card-body">
                            <form action="{{route('users.updateTruck',$truck->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top d-flex"><i class="bi bi-asterisk" style="color:red;font-size:7px"></i>ยี่ห้อรถ</label>                                        
                                        <input class="form-control" list="datalistOptions" name="brand" id="exampleDataList"  placeholder="กรุณาเลือกยี่ห้อ"  onkeyup="this.value = this.value.toUpperCase();" value="{{$truck->brand}}" required>
                                        <datalist id="datalistOptions">
                                            <option value="FOTON"></option>
                                            <option value="HINO"></option>
                                            <option value="ISUZU"></option>
                                            <option value="MITSUBISHI"></option>
                                            <option value="NISSAN"></option>
                                            <option value="หางพ่วง JPN"></option>
                                            <option value="หางพ่วง SMC"></option>
                                            <option value="หางพ่วง TBT"></option>
                                            <option value="หางพ่วง SMM"></option>
                                        </datalist>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>รุ่นรถ                                        
                                        </label>
                                        <input type="text" class="form-control input_data" id="Modelcar" name="model" placeholder="กรุณาใส่รุ่น  (ตัวอย่าง PC200-5A)" value="{{$truck->model}}" onkeyup="this.value = this.value.toUpperCase();" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>ประเภทรถ                                        
                                        </label>
                                        <input type="text" class="form-control input_data" name="type" id="" list="Type_truck" value="{{$truck->type}}" placeholder="กรุณาเลือกประเภท" required>
                                        <datalist id="Type_truck">    
                                            <option value="ไม่ได้ระบุประเภท"></option>
                                            <option value="รถบรรทุกน้ำ 10 ล้อ"></option>
                                            <option value="รถบรรทุก 6 ล้อ"></option>
                                            <option value="รถบรรทุกเทท้าย 10 ล้อ"></option>
                                            <option value="รถบรรทุกน้ำ 6 ล้อ"></option>
                                            <option value="รถเทรลเลอร์ 18 ล้อ"></option>
                                            <option value="หางพ่วง"></option>
                                            <option value="รถบรรทุกติดตั้งเครนสลิง"></option>
                                            <option value="รถบรรทุกโดยสาร"></option>
                                            <option value="รถเทรลเลอร์ 10 ล้อ"></option>
                                            <option value="รถบรรทุกเทท้าย 6 ล้อ"></option>
                                            <option value="รถปรับสภาพพื้นผิวถนน 6 ล้อ"></option>
                                            <option value="รถปรับสภาพพื้นผิวถนนอัตโนมัติ"></option>
                                            <option value="รถเจาะบ่อบาดาล 6 ล้อ"></option>
                                            <option value="รถสุขาเคลื่อนที่"></option>
                                            <option value="รถบรรทุกขยะ"></option>
                                            <option value="รถบรรทุกสเปรย์ยาง"></option>                                 
                                        </datalist>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>ทะเบียนรถยนต์                                        
                                        </label>
                                        <input type="text" class="form-control input_data" name="license" id="Licensecar" placeholder="กรุณาใส่ทะเบียน  (ตัวอย่าง ต-6411)" value="{{$truck->license}}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>รหัส                                        
                                        </label>
                                        <input type="text" class="form-control input_data" name="code_machine" id="Code_machinecar" placeholder="กรุณาใส่รหัส  (ตัวอย่าง 001-54-0091)" value="{{$truck->code_machine}}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>จำนวนแรงม้า                                        
                                        </label>
                                        <input type="text" class="form-control input_data" name="hp_kw" id="Hp_kw" placeholder="กรุณาใส่จำนวนแรงม้า  (ตัวอย่าง 170)" value="{{$truck->hp_kw}}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>ปีที่จัดซื้อ                                        
                                        </label>
                                        <input type="text" class="form-control input_data" id="" name="year" placeholder="กรุณาใส่ปีที่จัดซื้อ  (ตัวอย่าง 2564)" value="{{$truck->year}}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>งบประมาณ                                        
                                        </label>
                                        <input type="text" class="form-control input_data" id="" name="budget" placeholder="กรุณาใส่งบประมาณ  (ตัวอย่าง 493800)" value="{{$truck->budget}}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>หน่วยงานที่ใช้งาน                                        
                                        </label>
                                        <input type="text" class="form-control input_data" id="" name="owner" placeholder="กรุณาเลือกหน่วยงาน" list="Owner_car" value="{{$truck->owner}}" required>
                                            <datalist id="Owner_car">    
                                                <option value="กองช่าง"></option>
                                                <option value="กองการเจ้าหน้าที่"></option>
                                                <option value="กองการศึกษาและวัฒนธรรม"></option>
                                                <option value="กองกิจการพาณิชย์"></option>
                                                <option value="กองคลัง"></option>
                                                <option value="กองพัสดุและทรัพย์สิน"></option>
                                                <option value="กองยุทธศาสตร์ฯ"></option>
                                                <option value="กองสวัสดิการสังคม"></option>
                                                <option value="สำนักงานเลขานุการฯ"></option>
                                                <option value="สำนักปลัดฯ"></option>
                                                <option value="หน่วยตรวจสอบภายใน"></option>
                                                <option value="รร.สวนกุหลาบฯ"></option>
                                                <option value="กองสาธารณสุขฯ"></option>
                                            </datalist>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>ผู้รับผิดชอบ                                            
                                        </label>
                                            <input type="text" class="form-control input_data" id="Name_res_car" name="responsible_person" placeholder="กรุณาใส่ ชื่อ นามสกุล  (ตัวอย่าง มานี  ปรีดาชัย)" value="{{$truck->responsible_person}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>เบอร์โทรศัพท์                                            
                                        </label>
                                            <input type="text" class="form-control input_data" id="Phonecar" name="phone" placeholder="กรุณาใส่เบอร์โทรศัพท์" maxlength="10" value="{{$truck->phone}}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for=" " class="form-label label_top"> หมายเหตุ </label>
                                        <input type="text" class="form-control input_data" id="Notecar" name="note" placeholder="กรุณาใส่หมายเหตุ (ถ้ามี)" value="{{$truck->note}}" >
                                    </div>
                                </div>
                                <div class="row mt-3" style="display: none">
                                    <div class="col-md-2">
                                        <input type="text" class="form-control input_data" id="" name="is_status" placeholder="0" value="0" >
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control input_data" id="" name="deleted" placeholder="0" value="0">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="formFile" class="form-label d-flex"><i class="bi bi-asterisk" style="color:red;font-size:7px"></i>เพิ่มรูปภาพ (เพิ่มได้มากกว่า 1 รูป)</label>
                                        <input class="form-control-file border" type="file" id="formFile" name="path_img[]" multiple accept="image/*" >                                                                                
                                    </div>                                                                    
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12" style="text-align:center;margin-top:10px">                                    
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                            <i class="bi bi-floppy2-fill" style="padding-right:.25rem"></i> บันทึกข้อมูล
                                        </button>                                    
                                        <div class="modal fade" id="modal-default">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title">ยืนยันการบันทึกข้อมูล</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>กรุณากด "ยืนยัน" เพื่อบันทึกข้อมูล</h4>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>      
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>          
@endsection