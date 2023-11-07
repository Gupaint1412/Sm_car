@extends('layouts.no_chart_template')
@section('content')  
<style>
.custom__form input {
  opacity: 0;
  height: 0;
}
.custom__image-container {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
}
.custom__image-container label {
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 150%;
  cursor: pointer;
  width: 100px;
  height: 100px;
  border: solid 1px black;
  border-radius: 5px;
  object-fit: cover;
}
.custom__image-container img {
  width: 100px;
  height: 100px;
  border: solid 1px black;
  border-radius: 5px;
  object-fit: cover;
}
</style>  
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12 d-flex align-items-center" style="justify-content:space-between">                          
                <a href="{{ route('admin.car') }}" class="btn btn-secondary d-flex align-items-center"><i class='bx bxs-left-arrow' style="padding-right:.25rem"></i>ย้อนกลับ</a>
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
                        <div class="card-header bg bg-primary d-flex align-items-center"><i class="bi bi-plus-square" style="padding-right:.5rem"></i>เพิ่มข้อมูลรถยนต์หน่วยงาน</div>
                        <div class="card-body">
                            <form action="{{route('admin.storeCar')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="brand">ยี่ห้อรถ</label>
                                        <input type="text" class="form-control input_data" id="Brandcar" name="brand" list="Brand_car"placeholder="กรุณาเลือกยี่ห้อรถ" onkeyup="this.value = this.value.toUpperCase();" required>
                                            <datalist id="Brand_car">    
                                                <option value="AUDI">Audi</option>
                                                <option value="BMW">Bmw</option>
                                                <option value="CHEVROLET">Chevrolet</option>
                                                <option value="EVT">Evt</option>
                                                <option value="FORD">Ford</option>
                                                <option value="HAVAL">Haval</option>
                                                <option value="HONDA">Honda</option>
                                                <option value="HYUNDAI">Hyundai</option>
                                                <option value="ISUZU">Isuzu</option>
                                                <option value="KIA">Kia</option>
                                                <option value="LEXUS">Lexus</option>
                                                <option value="MAZDA">Mazda</option>
                                                <option value="MERCEDES-BENZ">Mercedes-Benz</option>
                                                <option value="MG">Mg</option>
                                                <option value="MINI">Mini</option>
                                                <option value="MITSUBISHI">Mitsubishi</option>
                                                <option value="NISSAN">Nissan</option>
                                                <option value="PEUGEOT">Peugeot</option>
                                                <option value="PORSCHE">Porsche</option>
                                                <option value="SUBARU">Subaru</option>
                                                <option value="SUZUKI">Suzuki</option>
                                                <option value="TOYOTA">Toyota</option>
                                                <option value="VOLKSWAGEN">Volkswagen</option>
                                                <option value="VOLVO">Volvo</option>
                                            </datalist> 
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top">
                                            รุ่นรถ                                        
                                        </label>
                                        <input type="text" class="form-control input_data" id="Modelcar" name="model" placeholder="กรุณาใส่รุ่นรถ  (ตัวอย่าง TRITON)" onkeyup="this.value = this.value.toUpperCase();" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top">
                                            ประเภทรถ                                        
                                        </label>
                                        <input type="text" class="form-control input_data" name="type" id="Typecar" list="Type_car" placeholder="กรุณาเลือกประเภทรถ" required>
                                            <datalist id="Type_car">    
                                                <option value="ไม่ได้ระบุประเภท"></option>
                                                <option value="รถกระบะ ตอนเดียว"></option>
                                                <option value="รถตู้"></option>
                                                <option value="รถเก๋ง"></option>
                                                <option value="รถพลังงานไฟฟ้า"></option>
                                                <option value="รถราง"></option>
                                                <option value="รถกระบะ 4 ประตู(มีหลังคา)"></option>
                                                <option value="4ประตู มีหลังคา"></option>
                                                <option value="รถกระบะ แบบแค็บ"></option>
                                                <option value="MPV"></option>
                                            </datalist>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="" class="form-label label_top">
                                            ทะเบียนรถยนต์                                        
                                        </label>
                                        <input type="text" class="form-control input_data" name="license" id="Licensecar" placeholder="กรุณาใส่ทะเบียนรถ  (ตัวอย่าง บว-4007)" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label label_top">
                                            รหัส                                        
                                        </label>
                                        <input type="text" class="form-control input_data" name="code_machine" id="Code_machinecar" placeholder="กรุณาใส่รหัส  (ตัวอย่าง 001-54-0091)" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top">
                                            ปีที่จัดซื้อ                                        
                                        </label>
                                        <input type="text" class="form-control input_data" id="" name="year" placeholder="กรุณาใส่ปีที่จัดซื้อ  (ตัวอย่าง 2564)" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top">
                                            งบประมาณ                                        
                                        </label>
                                        <input type="text" class="form-control input_data" id="" name="budget" placeholder="กรุณาใส่งบประมาณ  (ตัวอย่าง 493800)" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top">
                                            หน่วยงานที่ใช้งาน                                        
                                        </label>
                                        <input type="text" class="form-control input_data" id="" name="owner" placeholder="กรุณาเลือกหน่วยงาน" list="Owner_car" required>
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
                                        <label for="" class="form-label label_top">
                                            ผู้รับผิดชอบ                                            
                                        </label>
                                            <input type="text" class="form-control input_data" id="Name_res_car" name="responsible_person" placeholder="กรุณาใส่ ชื่อ นามสกุล  (ตัวอย่าง มานี  ปรีดาชัย)" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label label_top">
                                            เบอร์โทรศัพท์                                            
                                        </label>
                                            <input type="text" class="form-control input_data" id="Phonecar" name="phone" placeholder="กรุณาใส่เบอร์โทรศัพท์" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for=" " class="form-label label_top"> หมายเหตุ </label>
                                        <input type="text" class="form-control input_data" id="Notecar" name="note" placeholder="กรุณาใส่หมายเหตุ (ถ้ามี)" >
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
                                        <label for="formFile" class="form-label">เพิ่มรูปภาพ (เพิ่มได้มากกว่า 1 รูป)</label>
                                        <input class="form-control-file border" type="file" id="formFile" name="path_img[]" multiple accept="image/*" > 
                                       
                                        
                                    </div>                                                                    
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12" style="text-align:center;margin-top:10px">                                    
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
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