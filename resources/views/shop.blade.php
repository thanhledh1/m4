<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
#items_container .content_box div {
    box-shadow: 0 0 3px rgba(0, 0, 0, .3);
    padding: 15px;
    margin-bottom: 20px;
}
</style>

@extends('masteruser')
@section('content1')
<div class="container-fluid mb-3">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#header-carousel" data-slide-to="1"></li>
                    <li data-target="#header-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item position-relative active" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="https://i.ytimg.com/vi/vMVwdSp489E/sddefault.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                {{-- <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Men Fashion</h1> --}}
                                {{-- <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p> --}}
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="https://stcv4.hnammobile.com/uploads/news/large/iphone-14-series-luon-co-san-hang-giao-ngay-khong-can-doi-social.jpg?v=1668565357" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                {{-- <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Women Fashion</h1> --}}
                                {{-- <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p> --}}
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item position-relative" style="height: 430px;">
                        <img class="position-absolute w-100 h-100" src="https://uploads-ssl.webflow.com/6073fad993ae97919f0b0772/609fa7b53c435fb27393587d_dd5787fa0c9306323b7176ce91a4d31ff6041c4a2.jpg" style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                {{-- <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Kids Fashion</h1> --}}
                                {{-- <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p> --}}
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src=https://bizweb.dktcdn.net/100/435/329/products/voucher-16-copy.jpg?v=1633085526863" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 20%</h6>
                    <h3 class="text-white mb-3">Special Offer</h3>
                    <a href="" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
            <div class="product-offer mb-30" style="height: 200px;">
                <img class="img-fluid" src="https://nemkhuyenmai.com/wp-content/uploads/2022/07/500k.png" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 20%</h6>
                    <h3 class="text-white mb-3">Special Offer</h3>
                    <a href="" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="{{ route('shop.apple') }}">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="https://buatlogoonline.com/wp-content/uploads/2022/10/Logo-Iphone-1024x979.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>APPLE</h6>
                            <small class="text-body">100 Products</small>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="{{ route('shop.samsung') }}">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="https://i.pinimg.com/474x/76/50/20/7650202e956e24e2b92449ca3e888e51.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>SAMSUNG</h6>
                            <small class="text-body">100 Products</small>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="{{ route('shop.xiaomi') }}">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Xiaomi_logo.svg/1024px-Xiaomi_logo.svg.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>XIAOMI</h6>
                            <small class="text-body">100 Products</small>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="{{ route('shop.vivo') }}">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="data:image/png;base64,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" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>VIVO</h6>
                            <small class="text-body">100 Products</small>
                        </div>
                    </div>
                </a>
            </div>


        </div>
    </div>

    <!-- Categories End -->
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span></h2>
        <div style="margin-left: 50px;">
            <form action="{{ route('shop.search') }}" method="GET">
                <input type="text" name="keyword" placeholder="Search for products" value="{{ old('keyword') }}">
                <button class="btn btn-primary btn-sm" type="submit">Search</button>
            </form>
        </div>
        <div class="row px-xl-5" id="items_container">
    @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">

                        <img style="width:200px ; height: 165px ; border-radius:0%"
                        src="{{ asset('public/uploads/product/' . $product->image) }}" alt="">

                        <div class="product-action">
                            @if ($product->quantity > 0)
                                    <a class="btn btn-outline-dark btn-square"
                                        href="{{ route('add.to.cart', $product->id) }}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                @else
                                    <a class="btn btn-outline-dark btn-square disabled"
                                        href="{{ route('add.to.cart', $product->id) }}"><i
                                            class="fa fa-shopping-cart"></i></a>
                                @endif

                            <a class="btn btn-outline-dark btn-square" href="{{ route('shop.show', $product->id) }}"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <p class="h6 text-decoration-none text-truncate">
                            Số lượng {{$product->quantity}}
                        </p>
                        <p class="h6 text-decoration-none text-truncate">
                            Tình trạng
                            @if ($product->quantity == 0)
                                <span class="text-danger">Hết hàng</span>
                            @else
                                <span class="text-success">Còn hàng</span>
                            @endif
                        </p>

                        <a class="h6 text-decoration-none text-truncate" href="{{ route('shop.show', $product->id) }}">{{ $product->name }}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>{{ number_format($product->price) }}</h5><h6 class="text-muted ml-2"><del>{{ number_format($product->price) }}</del></h6>


                        </div>

                    </div>
                </div>
            </div>
    @endforeach
        </div>
        <div class="col-md-12">
            <div class="text-center">
                <button id="load_more_button" data-page="{{ $products->currentPage() + 1 }}"
                    class="btn btn-primary">Load More</button>
            </div>
    </div>


    <!-- Products End -->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>




 <script>
     $(document).ready(function() {
         @if(session('success'))
             Swal.fire({
                 icon: 'success',
                 title: '{{ session('success') }}',
                 showConfirmButton: false,
                 timer: 1500
             });
         @endif
     });
 </script>
 <script type="text/javascript">
    $('#keywords').keyup(function(){
        var query = $(this).val();
          if(query != '')
            {
             var _token = $('input[name="_token"]').val();
             $.ajax({
              url:"{{url('shop/autocomplete-ajax')}}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#search_ajax').fadeIn();
                $('#search_ajax').html(data);
              }
             });
            }else{
              $('#search_ajax').fadeOut();
            }
        });
        $(document).on('click', '.li_search_ajax', function(){
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>
@endsection

{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> --}}


   <!-- Products End -->

