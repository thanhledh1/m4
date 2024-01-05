<div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100">
                <a class="text-body mr-3" href="">About</a>
                <a class="text-body mr-3" href="">Contact</a>
                <a class="text-body mr-3" href="">Help</a>
                <a class="text-body mr-3" href="">FAQs</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                {{-- <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a hrefrou="{{te('login.index')}}" class="dropdown-item">Sign in</a>
                        <form action="{{ route('logout.user') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Log out</button>
                          </form>

                    </div>
                </div> --}}



                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Xin Chào
                        @if (isset(Auth()->guard('customers')->user()->name))
                            {{ Auth()->guard('customers')->user()->name }}
                        @else
                            My Account
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        @if (isset(Auth()->guard('customers')->user()->name))
                            <form action="{{ route('logout.user') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Đăng Xuất</button>
                            </form>
                        @else
                            <a href="{{ route('login.index') }}" class="dropdown-item" type="button">Đăng Nhập</a>
                        @endif
                    </div>
                </div>

                {{-- <div class="btn-group mx-2">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">EUR</button>
                        <button class="dropdown-item" type="button">GBP</button>
                        <button class="dropdown-item" type="button">CAD</button>
                    </div>
                </div> --}}
                {{-- <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">FR</button>
                        <button class="dropdown-item" type="button">AR</button>
                        <button class="dropdown-item" type="button">RU</button>
                    </div>
                </div> --}}
            </div>
            <div class="d-inline-flex align-items-center d-block d-lg-none">
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-heart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-shopping-cart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="{{ route('shop.index')}}" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">thegioididong</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">.com</span>
            </a>
        </div>
        {{-- <div class="col-lg-4 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div> --}}
        {{-- <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Customer Service</p>
            <h5 class="m-0">+012 345 6789</h5>
        </div> --}}
    </div>
</div>
