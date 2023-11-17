@extends('layouts.no_chart_template')
@section('content')    
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12 d-flex align-items-center" style="justify-content:space-between">                          
                <a href="{{ route('admin.machine') }}" class="btn btn-secondary d-flex align-items-center"><i class='bx bxs-left-arrow' style="padding-right:.25rem"></i>ย้อนกลับ</a>
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
                        <div class="card-header bg bg-primary d-flex align-items-center" style="justify-content: space-between">
                            <div class="box"><i class="bi bi-plus-square" style="padding-right:.5rem"></i>เพิ่มข้อมูลเครื่องจักร</div>
                            <svg class="w3-animate-zoom" style="top:15px;margin-left:auto" version="1.0" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="rgba(255,255,255,1)" stroke="none">
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
                        <div class="card-body">
                            <form action="{{route('admin.storeMachine')}}" method="POST" enctype="multipart/form-data">
                                @csrf                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="brand" class="d-flex"><i class="bi bi-asterisk" style="color:red;font-size:7px"></i>ยี่ห้อรถ</label>
                                        <input type="text" class="form-control input_data" id="Brandcar" name="brand" list="Brand_machine"placeholder="กรุณาเลือกยี่ห้อ" onkeyup="this.value = this.value.toUpperCase();" required>
                                        <datalist id="Brand_machine">    
                                            <option value="ISUZU">Isuzu</option>
                                            <option value="KOMATSU">Komatsu</option>
                                            <option value="MITSUBISHI">Mitsubishi</option>
                                            <option value="HINO">Hino</option>
                                            <option value="SINGTHAI">Singthai</option>
                                            <option value="HITACHI">Hitachi</option>
                                            <option value="CATTERPINRA">Catterpinra</option>
                                            <option value="DYNAPAC">Dynapac</option>
                                            <option value="EUROPEAN">European</option>
                                            <option value="KOBELCO">Kobelco</option>
                                            <option value="KUBOTA">Kubota</option>
                                            <option value="NISSAN">Nissan</option>
                                            <option value="YANMAR">Yanmar</option>
                                            <option value="ARD">Ard</option>
                                            <option value="BOMAG">Bomag</option>
                                            <option value="CHAMP">Champ</option>
                                            <option value="CUKUROVA">Cukurova</option>
                                            <option value="KAT">Kat</option>
                                            <option value="NEWHOLLAND">Newholland</option>
                                            <option value="PUMAC">Pumac</option>
                                            <option value="SAKAI">Sakai</option>
                                            <option value="VOLVO">Volvo</option>
                                        </datalist> 
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>รุ่นรถ                                        
                                        </label>
                                        <input type="text" class="form-control input_data" id="Modelcar" name="model" placeholder="กรุณาใส่รุ่นรถ  ( ตัวอย่าง PC200-5A )" onkeyup="this.value = this.value.toUpperCase();" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>ประเภทรถ                                        
                                        </label>
                                        <input type="text" class="form-control input_data" name="type" list="Type_machine" placeholder="กรุณาเลือกประเภท" required>
                                        <datalist id="Type_machine">    
                                            <option value="ไม่ได้ระบุประเภท"></option>
                                            <option value="ขุดไฮโดรลิค"></option>
                                            <option value="รถบรรทุกน้ำ 10 ล้อ"></option>
                                            <option value="รถบรรทุกเทท้าย 10 ล้อ"></option>
                                            <option value="รถบดล้อเหล็กสั่นสะเทือน"></option>
                                            <option value="รถฟาร์มแทร็คเตอร์"></option>
                                            <option value="รถเทรลเลอร์ 18 ล้อ"></option>
                                            <option value="รถบรรทุกน้ำ 6 ล้อ"></option>
                                            <option value="เกรดเดอร์"></option>
                                            <option value="ขุดไฮโดรลิค บูมยาว"></option>
                                            <option value="รถบรรทุก ขนาด 4 ตัน"></option>
                                            <option value="รถปรับสภาพพื้นผิวถนน"></option>
                                            <option value="รถบดล้อยาง"></option>
                                            <option value="รถบรรทุกเทท้าย"></option>
                                            <option value="รถเทรลเลอร์ 10 ล้อ"></option>
                                            <option value="รถตักหน้าขุดหลัง"></option>
                                            <option value="รถบรรทุก"></option>
                                            <option value="รถบรรทุก ขนาด 2 ตัน"></option>
                                            <option value="รถเจาะบ่อบาดาล"></option>
                                            <option value="แทร็คเตอร์"></option>
                                            <option value="ขุดเจาะอเนกประสงค์"></option>
                                            <option value="บรรทุกติดตั้งเครนสลิง"></option>
                                            <option value="บรรทุกน้ำ 1 คิว"></option>
                                            <option value="รถตักล้อยาง"></option>
                                            <option value="รถบรรทุก ขนาด 6 ตัน"></option>
                                            <option value="รถบรรทุกขยะ 4 ล้อ"></option> 
                                            <option value="รถบรรทุกโดยสาร"></option>
                                            <option value="รถปูยางแอสฟัลท์ติก"></option>
                                            <option value="รถสุขาเคลื่อนที่"></option>
                                            <option value="รถโดยสาร มินิบัส"></option>
                                            <option value="สเปรย์ยาง 6 ล้อ"></option>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>ทะเบียน                                    
                                        </label>
                                        <input type="text" class="form-control input_data" name="license" id="Licensecar" placeholder="กรุณาใส่ทะเบียนรถ  (ตัวอย่าง บว-4007)" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>รหัส                                        
                                        </label>
                                        <input type="text" class="form-control input_data" name="code_machine" id="Code_machinecar" placeholder="กรุณาใส่รหัส  (ตัวอย่าง 001-54-0091)" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>ปีที่จัดซื้อ                                        
                                        </label>
                                        <input type="text" class="form-control input_data" id="" name="year" placeholder="กรุณาใส่ปีที่จัดซื้อ  (ตัวอย่าง 2564)" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>งบประมาณ                                        
                                        </label>
                                        <input type="text" class="form-control input_data" id="" name="budget" placeholder="กรุณาใส่งบประมาณ  (ตัวอย่าง 493800)" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>หน่วยงานที่ใช้งาน                                        
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
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>ผู้รับผิดชอบ                                            
                                        </label>
                                            <input type="text" class="form-control input_data" id="Name_res_car" name="responsible_person" placeholder="กรุณาใส่ ชื่อ นามสกุล  (ตัวอย่าง มานี  ปรีดาชัย)" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label label_top d-flex">
                                            <i class="bi bi-asterisk" style="color:red;font-size:7px"></i>เบอร์โทรศัพท์                                            
                                        </label>
                                            <input type="text" class="form-control input_data" id="Phonecar" name="phone" placeholder="กรุณาใส่เบอร์โทรศัพท์" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for=" " class="form-label label_top"> หมายเหตุ </label>
                                        <input type="text" class="form-control input_data" id="Notecar" name="note" placeholder="กรุณาใส่หมายเหตุ (ถ้ามี)">
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
                                                        <h5 class="modal-title">ยืนยันการแก้ไขข้อมูล</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>กรุณากด "ยืนยัน" เพื่อบันทึกข้อมูล</h4>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                                        <button type="submit" class="btn btn-success">ยืนยัน</button>
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