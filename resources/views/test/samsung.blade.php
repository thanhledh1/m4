@extends('masteruser')
@section('content1')

<div class="row px-xl-5">
    @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">

                        <img style="width:200px ; height: 165px ; border-radius:0%"
                        src="{{ asset('public/uploads/product/' . $product->image) }}" alt="">

                        {{-- <img class="img-fluid w-100"  src="{{ asset('public/uploads/product/' . $product->image) }}" alt=""> alt=""> --}}
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="{{ route('add.to.cart', $product->id) }}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="{{ route('shop.show', $product->id) }}">{{ $product->name }}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>{{ number_format($product->price) }}</h5><h6 class="text-muted ml-2"><del>{{ number_format($product->price) }}</del></h6>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
        </div>
    </div>

@endsection
