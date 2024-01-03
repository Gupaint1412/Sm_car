<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  @if( Auth::user()->is_admin == 99 )
    <a href="{{route('admin.home')}}" class="brand-link">
      <img src="{{ asset('/logo/logo_pao.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" >
      <span class="brand-text font-weight-light" style="font-size:large">ข้อมูลรถยนต์ส่วนกลาง</span>
    </a>
  @elseif( Auth::user()->is_admin == 2 )
    <a href="{{route('users.home')}}" class="brand-link">
      <img src="{{ asset('/logo/logo_pao.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">User 2 Car </span>
    </a>
  @elseif( Auth::user()->is_admin == 1 )
    <a href="{{route('users.home')}}" class="brand-link">
      <img src="{{ asset('/logo/logo_pao.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">User 1 Car </span>
    </a>
  @else
    <a href="#" class="brand-link">
      <img src="{{ asset('/img_adminlte/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Error Car </span>
    </a>
  @endif
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if( Auth::user()->is_admin == 2 )
          <img src="{{ asset('/img_adminlte/user1-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
        @else
          <img src="{{ asset('/img_adminlte/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        @endif
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }} {{ Auth::user()->department }}</a>
      </div>
    </div>
   
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">        
       
        {{-- <li class="nav-item">
          <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Widgets
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li> --}}
        @if( Auth::user()->is_admin == 99 )
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Expire
              {{-- <span class="right badge badge-danger">New</span> --}}
            </p>
          </a>
        </li>
        @elseif( Auth::user()->is_admin == 2 )
        <li class="nav-item">
          <a href="{{route('users.expire')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
             Expire
              <span class="right badge " style="background-image: linear-gradient(to right, #9D50BB, #6E48AA);">New</span>
            </p>
          </a>
        </li>
        @elseif( Auth::user()->is_admin == 1 )
        <li class="nav-item">
          <a href="{{route('users.expire')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
             Expire
              @if( Auth::user()->agency == 'กองพัสดุ' )
                <span class="right badge "style="background-image: linear-gradient(to right, #9D50BB, #6E48AA);">Plus</span>
              @endif
            </p>
          </a>
        </li>
        @endif             
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>

  <!-- /.sidebar -->
</aside>