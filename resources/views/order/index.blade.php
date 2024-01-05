@extends('masteradmin')
@section('content')
    <h1 style="text-align: center">Đơn hàng</h1>
    <hr>
    <td> <a style="width:10%" class="btn btn-primary" href="{{ route('xuat') }}">Xuất file excel </a> </td>
    <table  class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Khách Hàng</th>
                <th scope="col">Email</th>
                <th scope="col">Số Điện Thoại</th>
                <th scope="col">Địa Chỉ</th>
                <th scope="col">Ngày Đặt Hàng</th>

                <th scope="col">Tùy Chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key => $item)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $item->customer->name }}</td>
                    <td>{{ $item->customer->email }}</td>
                    <td>{{ $item->customer->phone }}</td>
                    <td>{{ $item->customer->address }}</td>
                    <td>{{ $item->date_at }}</td>

                    <td>
                        <form action="{{ route('order.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="badge badge-success" href="{{ route('order.detail', $item->id) }}">Chi tiết</a>
                            <button class="badge badge-danger" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
