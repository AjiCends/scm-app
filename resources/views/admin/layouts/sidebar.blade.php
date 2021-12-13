<div class="sidebar shadow p-3 me-3 fixed-top">
    <a href="{{ route('bahan-baku.index') }}" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-5 fw-semibold">SCM-APP</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Dashboard
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">            
            <li><a href="{{ route('admin.dashboard') }}" class="link-dark rounded">Dashboard</a></li>            
          </ul>
        </div>
      </li>
      @can('view material')
        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#bahan-baku-collapse" aria-expanded="false">
            Bahan Baku
          </button>
          <div class="collapse" id="bahan-baku-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">            
              <li><a href="{{ route('bahan-baku.index') }}" class="link-dark rounded">Daftar Bahan Baku</a></li>            
            </ul>
          </div>
        </li>              
      @endcan
      @can('create employee')
        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#pengguna-collapse" aria-expanded="false">
            Pengguna
          </button>
          <div class="collapse" id="pengguna-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">            
              <li><a href="{{ route('pengguna.index') }}" class="link-dark rounded">Daftar Karyawan</a></li>            
            </ul>
          </div>
        </li>              
      @endcan
    </ul>
    <div class="d-flex" style="height: 75%">
      <div class="mt-auto">
        @if (Auth::check())
        <h5 class="">{{ Auth::user()->name }}</h5>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger text-white">Logout</button>          
          </form>                           
        @else
          <a href="{{ route('login') }}" class="btn btn-dark text-white">Login</a>
        @endif
      </div>
    </div>
  </div>


