@extends('masteradmin')

<style>
    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
<h1 style="text-align: center"> Danh sách Khách hàng</h1>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Tên Khách Hàng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số Điện Thoại</th>
                    <!-- Thêm các cột khác nếu cần -->
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $r)
                    <tr>
                        <td>{{ $r->name }}</td>
                        <td>{{ $r->email }}</td>
                        <td>{{ $r->address }}</td>
                        <td>{{ $r->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  {{ $customer->links('pagination::bootstrap-4') }}
  @endsection


