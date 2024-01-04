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
{{-- <ul style="list-style-type: none;">
<li >
    <select class=" changeLang">
        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>EN</option>
        <option value="vi" {{ session()->get('locale') == 'vi' ? 'selected' : '' }}>VI</option>
    </select>

</li>
</ul>
    <div class="container">
        <form action="{{ route('product.search') }}" method="GET">
            <input  type="text" name="keyword" placeholder="Enter keyword" value="{{ old('keyword') }}">
            <button class="btn btn-primary btn-sm" type="submit">Search</button>
        </form>

    </div> --}}

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        {{-- <h4 class="card-title">Striped Table</h4> --}}
        {{-- <p class="card-description">
          Add class <code>.table-striped</code>
        </p> --}}
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


