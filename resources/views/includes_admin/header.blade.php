<div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">{{ Auth::user()->name }}</span></h1>
            <h3 class="welcome-sub-text">{{ Auth::user()->group->name }} </h3>
          </li>
        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
        <ul>
          @if (Auth::check())
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="mdi mdi-power text-primary me-2"   type="submit">Logout</button>
              </form>

        
          @else
            <li>
              <a href="{{ route('login') }}">Đăng nhập</a>
            </li>
          @endif
        </ul>
      </div>
