@extends('masteradmin')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<H1 style="text-align: center">CHI TIẾT SẢN PHẨM</H1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>{{ __('message.information') }}</th>
            <th>{{ __('message.detail') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ __('message.name_customer') }}</td>
            <td>{{ $product->name }}</td>
        </tr>
        <tr>
            <td>Slug</td>
            <td>{{ $product->slug }}</td>
        </tr>
        <tr>
            <td>{{ __('message.price') }}</td>
            <td>{{ number_format($product->price) }}</td>
        </tr>
        <tr>
            <td>{{ __('message.description') }}</td>
            <td>{{ $product->description }}</td>
        </tr>
        <tr>
            <td>{{ __('message.quantity') }}</td>
            <td>{{ $product->quantity }}</td>
        </tr>
        <tr>
            <td>{{ __('message.status') }}</td>
            <td>
                @if($product->status == 1)
                    Còn hàng
                @else
                    Hết hàng
                @endif
            </td>
        </tr>
        <tr>
            <td>{{ __('message.Product_company') }}</td>
            <td>{{ $product->category->name }}</td>
        </tr>
        <tr>
            <td>{{ __('message.image') }}</td>
            <td>
                <img style="width:200px; height:165px; border-radius:0%"
                    src="{{ asset('public/uploads/product/' . $product->image) }}" alt="">
            </td>
        </tr>
        <!-- Thêm các hàng khác nếu cần -->
    </tbody>
</table>
@endsection
