@extends('layouts.login_template')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin');

    /* Reseting */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Kanit', sans-serif;
    }

    body{
        /* background: #00E5FF; */
        background: powderblue;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .wrapper{
        max-width: 850px;
        background-color: #fff;
        border-radius: 10px;
        position: relative;
        display: flex;
        margin: 50px auto;
        box-shadow: 0 8px 20px 0px #1f1f1f1a;
        overflow: hidden;
    }

    .wrapper .form-left{
        background: #3786bd;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        /* padding: 20px 40px; */
        position: relative;
        /* width: 100%; */
        color: #fff;
    }

    .wrapper h2{
        font-weight: 700;
        font-size: 25px;
        padding: 5px 0 0;
        margin-bottom: 34px;
        pointer-events: none;
    }

    .wrapper .form-left p{
        font-size: 0.9rem;
        font-weight: 300;
        line-height: 1.5;
        pointer-events: none;
    }

    .wrapper .form-left .text{
        margin: 20px 0 25px;
    }

    .wrapper .form-left p span{
        font-weight: 700;
    }

    .wrapper .form-left input{
        padding: 15px;
        background: #fff;
        border-top-left-radius: 5px;
        border-bottom-right-radius: 5px;
        width: 180px;
        border: none;
        margin: 15px 0 50px 0px;
        cursor: pointer;
        color: #333;
        font-weight: 700;
        font-size: 0.9rem;
        appearance: unset;
        outline: none;
    }

    .wrapper .form-left input:hover{
        background-color: #f2f2f2;
    }

    .wrapper .form-right{
        padding: 20px 40px;
        position: relative;
        width: 100%;
    }

    .wrapper .form-right h2{
        color: #3786bd;
    }

    .wrapper .form-right label{
        font-weight: 600;
        font-size: 14px;
        color: #666;
        display: block;
        margin-bottom: 8px;
    }

    .wrapper .form-right .input-field{
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #e5e5e5;
        border-top-left-radius: 5px;
        border-bottom-right-radius: 5px;
        outline: none;
        color: #333;
    }

    .wrapper .form-right .input-field:focus{
        border: 1px solid #31a031;
    }


    .wrapper .option {
        display: block;
        position: relative;
        padding-left: 30px;
        margin-bottom: 12px;
        font-size: 0.95rem;
        font-weight: 900;
        cursor: pointer;
        user-select: none
    }

    .wrapper .option input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0
    }

    .wrapper .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 18px;
        width: 18px;
        background-color: #fff;
        border: 2px solid #ddd;
        border-radius: 2px
    }

    .wrapper .option:hover input~.checkmark {
        background-color: #f1f1f1
    }

    .wrapper .option input:checked~.checkmark {
        border: 2px solid #e5e5e5;
        background-color: #fff;
        transition: 300ms ease-in-out all
    }

    .wrapper .checkmark:after {
        content: "\2713";
        position: absolute;
        display: none;
        color: #3786bd;
        font-size: 1rem;
    }

    .wrapper .option input:checked~.checkmark:after {
        display: block
    }

    .wrapper .option .checkmark:after {
        left: 2px;
        top: -4px;
        width: 5px;
        height: 10px
    }

    .wrapper .register{
        padding: 12px;
        background: #3786bd;
        border-top-left-radius: 5px;
        border-bottom-right-radius: 5px;
        width: 130px;
        border: none;
        margin: 6px 0 50px 0px;
        cursor: pointer;
        color: #fff;
        font-weight: 700;
        font-size: 15px;
    }

    .wrapper .register:hover{
        background-color: #3785bde0;
    }

    .wrapper a{
        text-decoration: none;
    }

    .error{
     color:#F00;
    }
    .error.true{
    color:#6bc900;
    }
    @media (max-width: 860.5px) {
        .wrapper{
            margin: 50px 5px;
        }
    }


    @media (max-width: 767.5px){
        .wrapper{
            flex-direction: column;
            margin: 30px 20px;
        }

        .wrapper .form-left{
            border-bottom-left-radius: 0px;
        }

        
    }

    @media (max-width: 575px) {

        .wrapper{
            margin: 30px 15px;
        }

        .wrapper .form-left{
            padding: 25px;
        }
        .wrapper .form-right{
            padding: 25px;
        }
    }
</style>
<div class="wrapper">
    <div class="form-left" style="display: flex;justify-content:center;align-items:center;">
        <img src="{{asset('/img/logo_pao.png')}}" alt="">        
    </div>
    <form class="form-right" method="POST" action="{{ route('register') }}">
        @csrf
        <h2 class="text-uppercase">ลงทะเบียนเข้าใช้งาน</h2>
        <div class="mb-3">
           <div class="d-flex" style="justify-content: space-between"><div class="d-flex"><i class='bx bx-health' style="color:red;font-size:8px"></i><label>เลขบัตรประชาชน</label></div> <span class="error" style="margin-bottom:8px"></span></div>
            <input type="number" class="input-field" id="idcard" name="id_card" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;"  required/>            
        </div>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <div class="d-flex"><i class='bx bx-health' style="color:red;font-size:8px"></i><label>ชื่อ</label></div>
                <input type="text" name="name" id="name" class="input-field" required>
            </div>
            <div class="col-sm-6 mb-3">
                <div class="d-flex"><i class='bx bx-health' style="color:red;font-size:8px"></i><label>นามสกุล</label></div>
                <input type="text" name="surname" id="surname" class="input-field" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <div class="d-flex"><i class='bx bx-health' style="color:red;font-size:8px"></i><label>กอง</label></div>
                {{-- <input type="text" name="agency" id="agency" class="input-field" required> --}}
                <select id="agency" name="agency" class="input-field" required>
                    <option value="" style="text-align: center;">-- กรุณาเลือกกอง --</option>
                    <option value="สำนักปลัด">สำนักปลัด</option>
                    <option value="สำนักงานเลขานุการ">สำนักงานเลขานุการ</option>
                    <option value="กองคลัง">กองคลัง</option>
                    <option value="กองช่าง">กองช่าง</option>
                    <option value="กองสาธารณสุข">กองสาธารณสุข</option>
                    <option value="กองยุทธศาสตร์">กองยุทธศาสตร์</option>
                    <option value="กองการศึกษา">กองการศึกษา</option>
                    <option value="กองสวัสดิการสังคม">กองสวัสดิการสังคม</option>
                    <option value="กองพัศดุและทรัพย์สิน">กองพัศดุและทรัพย์สิน</option>
                    <option value="กองการท่องเที่ยวและกีฬา">กองการท่องเที่ยวและกีฬา</option>
                    <option value="กองการเจ้าหน้าที่">กองการเจ้าหน้าที่</option>
                    <option value="หน่วยตรวจสอบภายใน">หน่วยตรวจสอบภายใน</option>
                    <option value="โรงเรียนสวนกุหลาบ">โรงเรียนสวนกุหลาบ</option>
                </select>
            </div>
            <div class="col-sm-6 mb-3">
                <div class="d-flex"><i class='bx bx-health' style="color:red;font-size:8px"></i><label>ฝ่าย</label></div>
                <input type="text" name="department" id="department" class="input-field" required>
            </div>
        </div>
        <div class="mb-3">
            <div class="d-flex"><i class='bx bx-health' style="color:red;font-size:8px"></i><label>เบอร์โทรศัพท์</label></div>
            <input type="number" class="input-field" name="phone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" required/>
        </div>
        <div class="mb-3">
            <div class="d-flex"><i class='bx bx-health' style="color:red;font-size:8px"></i><label>อีเมล</label></div>
            <input type="email" class="input-field" name="email" required>
        </div>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <div class="d-flex"><i class='bx bx-health' style="color:red;font-size:8px"></i><label>รหัสผ่าน</label></div>
                <input type="password" name="password" id="password" class="input-field" required>
            </div>
            <div class="col-sm-6 mb-3">
                <div class="d-flex"><i class='bx bx-health' style="color:red;font-size:8px"></i><label>ยืนยันรหัสผ่าน</label></div>
                <input type="password" name="password_confirmation" id="password-confirm" class="input-field" required>
            </div>
        </div>
        {{-- <div class="mb-3">
            <label class="option">I agree to the <a href="#">Terms and Conditions</a>
                <input type="checkbox" checked>
                <span class="checkmark"></span>
            </label>
        </div> --}}
        <div class="form-field" style="display: flex; justify-content:space-between;margin-top:1rem;">
            {{-- <input type="submit" value="Register" class="register" name="register"> --}}
            <a href="#" class="btn btn-secondary" style="display: flex;align-items:center;"><i class='bx bx-home' style="padding-right:.25rem"></i>หน้าหลัก</a>
            <button type="button" class="btn btn-primary" id="btn_register" style="display: flex;align-items:center" data-toggle="modal" data-target="#exampleModalCenter"><i class='bx bx-save' style="padding-right: .25rem"></i>ลงทะเบียน </button>            
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg bg-primary">
                    <h5 class="modal-title" id="exampleModalLongTitle"><i class='bx bx-save' style="padding-right: .25rem"></i>ยืนยันการลงทะเบียน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <h5 style="text-align:center;">กรุณากดยืนยันเพื่อลงทะเบียนเข้าใช้งานระบบ </h5>
                    </div>
                    <div class="modal-footer" style="justify-content: space-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-primary">ยืนยันลงทะเบียน</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection
