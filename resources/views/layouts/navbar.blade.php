<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <a href="{{ url('/home') }}" class="navbar-brand sidebar-gone-hide">TRANSPORT</a>

  {{-- <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a> --}}
  <div class="nav-collapse">
    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
      <i class="fas fa-ellipsis-v"></i>
    </a>
    <ul class="navbar-nav">
      <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link">HOME</a></li>
      {{-- <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link">DASHBOARD</a></li> --}}
      <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
        DASHBOARD
      </a>
    <ul class="dropdown-menu">
      <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link">Angkot</a></li>

      <li class="nav-item"><a href="{{ url('/dashboard_taksi') }}" class="nav-link">Taksi</a></li>
{{-- <li class="nav-item"><a href="{{ url('#') }}" class="nav-link">BUS BLUD</a></li>
      <li class="nav-item"><a href="{{ url('#') }}" class="nav-link">Damri</a></li>
--}}
    </ul>
  </li>
      <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
          JENIS TRANSPORTASI
        </a>
        <ul class="dropdown-menu">
          <li class="nav-item"><a href="{{url('/data/angkot')}}" class="nav-link">Angkot</a></li>
          <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Taksi</a>
            <ul class="dropdown-menu">
              <li class="nav-item"><a href="{{url('/data/taxi')}}" class="nav-link">Taksi Blue Bird</a></li>
              <li class="nav-item"><a href="{{url('/data/taxi_gr')}}" class="nav-link">Taksi Gemah Ripah</a></li>
              <li class="nav-item"><a href="{{url('/data/taxi_kk')}}" class="nav-link">Taksi Kota Kembang</a></li>
              <li class="nav-item"><a href="{{url('/data/taxi_primkopau/')}}" class="nav-link">Taksi Primkopau</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Bus BLUD</a>
            <ul class="dropdown-menu">
              <li class="nav-item"><a href="{{url('/data/tmb/')}}" class="nav-link">TMB</a></li>
              <li class="nav-item"><a href="{{url('/data/bandros/')}}" class="nav-link">Bandros</a></li>
              <li class="nav-item"><a href="{{url('/data/bmp/')}}" class="nav-link">Merah Putih</a></li>
              <li class="nav-item"><a href="{{url('/data/bs/')}}" class="nav-link">Bus Sekolah</a></li>
            </ul>
          </li>
          <li class="nav-item"><a href="{{url('/data/damri')}}" class="nav-link">Damri</a></li>
        </ul>
      </li>
      <li class="nav-item"><a href="{{ url('/data_trayek') }}" class="nav-link">DATA TRAYEK</a></li>
      <li class="nav-item"><a href="{{ url('/uji_kir') }}" class="nav-link">DATA UJI KIR</a></li>
      <li class="nav-item"><a href="{{ url('/embed') }}" class="nav-link">DATA EMBED</a></li>
      @can('isAdmin')
      <li class="nav-item"><a href="{{ url('/user/list') }}" class="nav-link">USER</a></li>
      @endcan
    </ul>
  </div>

  <form class="form-inline mx-auto">

  </form>
  <ul class="navbar-nav navbar-right">


<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        {{--<img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">--}}
        <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->email }}</div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
	{{--
        <a href="{{ url ('/profiles')}}" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <div class="dropdown-divider"></div>
	--}}
        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" 
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>
  </ul>
</nav>

{{-- <nav class="navbar navbar-secondary navbar-expand-lg"> --}}

</nav>