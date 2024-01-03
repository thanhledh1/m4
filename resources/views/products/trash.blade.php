@extends('masteradmin')
@section('content')



    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h2 class="offset-4"> Thùng rác sản phẩm</h2>
    <div class="table-responsive pt-3">
        <table class="table table-info" style="width:100%">
            <thead>
                <tr>
                    <th> #</th>
                    <th> Tên </th>
                    <th> Giá </th>
                    <th style="width:15%"> Mô tả </th>
                    <th> Số lượng </th>
                    <th> Ảnh </th>
                    <th> Trạng thái </th>
                    <th> Thể loại </th>
                    <th> Tùy chọn </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr data-expanded="true" class="item-{{ $product->id }}">
                        <td style="width:5%">{{ $key + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price) }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <img style="width:200px ; height: 165px ; border-radius:0%"
                                src="{{ asset('public/uploads/product/' . $product->image) }}" alt="">
                        </td>
                        <td>
                            @if ($product->status == 1)
                                Còn hàng
                            @else
                                Hết hàng
                            @endif
                        </td>
                        <td>{{ $product->category->name }}</td>

                        <td>
                            <form action="{{ route('product.restoredelete', $product->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success">Khôi Phục</button>
                                <a href="{{ route('product_destroy', $product->id) }}" id="{{ $product->id }}"
                                    class="btn btn-danger">Xóa</a>

                            </form>
                        </td>
                @endforeach


            </tbody>
        </table>
        {{ $products->appends(request()->query()) }}
    </div>
    {{-- <a style="width:7%" class="btn btn-info" href="{{ route('viewtrash') }}">Quay lại</a> --}}
    
@endsection
