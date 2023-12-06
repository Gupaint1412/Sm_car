@extends('layouts.login_template')

@section('content')

<style>
.profile-image-pic{
  height: 200px;
  width: 200px;
  object-fit: cover;
}
.cardbody-color{
  background-color: #ebf2fa;
}
a{
  text-decoration: none ;
}
</style>

<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">ฐานข้อมูลรถยนต์ส่วนกลาง</h2>
        <div class="text-center mb-5 text-dark">องค์การบริหารส่วนจังหวัดนครสวรรค์</div>
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="text-center">
              <img src="{{asset('/img/logo_pao.png')}}" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>
            <div class="mb-3">
              <input class="form-control" id="email" type="email" name="email" aria-describedby="emailHelp"
                placeholder="Email Address" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 mb-5 w-100">ลงชื่อเข้าใช้</button>
            </div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark d-flex" style="justify-content:space-between">
                <a href="{{ route('register') }}" class="text-dark fw-bold"><i class='bx bx-user-plus'></i> ลงทะเบียนเข้าใช้งาน </a> 
                <a href="#" class="text-dark fw-bold"><i class='bx bxs-show'></i> เข้าในฐานะผู้เยี่ยมชม </a>               
            </div>
            
          </form>
        </div>

      </div>
    </div>
</div>

@endsection
