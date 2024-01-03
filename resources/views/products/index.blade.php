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


@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<h1 style="text-align: center"> BẢNG SẢN PHẨM</h1>
<ul style="list-style-type: none;">
<li >
    <select class=" changeLang">
        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>EN</option>
        <option value="vi" {{ session()->get('locale') == 'vi' ? 'selected' : '' }}>VI</option>
    </select>

</li>
</ul>
    <div class="container">
        <a class="btn btn-primary" href="/product/create">Thêm</a>
        <form action="{{ route('product.search') }}" method="GET">
            <input  type="text" name="keyword" placeholder="Enter keyword" value="{{ old('keyword') }}">
            <button class="btn btn-primary btn-sm" type="submit">Search</button>
        </form>

    </div>

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
                        <th>#</th>
                        <th scope="col">{{ __('message.name_customer') }}</th>
                        <th scope="col">{{ __('message.description') }}</th>
                        <th scope="col">{{ __('message.status') }}</th>
                        <th scope="col">{{ __('message.Product_company') }}</th>
                        <th scope="col">{{ __('message.image') }}</th>
                        <th scope="col">{{ __('message.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $index => $r)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $r->name }}</td>
                            <td>{!! Str::limit($r->description, 20) !!}</td>
                            <td>
                                @if ($r->status == 1)
                                    Còn hàng
                                @else
                                    Hết hàng
                                @endif
                            </td>
                            <td>{{ $r->category->name }}</td>
                            <td>
                                <img style="width:200px; height:165px; border-radius:0%" src="{{ asset('public/uploads/product/' . $r->image) }}" alt="">
                            </td>
                            <td>
                                <form action="{{ route('product.softdeletes', $r->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    @if (Auth::user()->hasPermission('Product_forceDelete'))
                                    <button onclick="return confirm('Bạn có muốn chuyển danh mục này vào thùng rác không?');" class="badge badge-danger">Xóa</button>
                                    @endif
                                    @if (Auth::user()->hasPermission('Product_update'))
                                    <a class="badge badge-info" href="{{route('product.edit',$r->id)}}">{{ __('message.edit') }}</a>
                                    @endif
                                    <a class="badge badge-success" href="{{route('product.show',$r->id)}}">{{ __('message.show') }}</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
  {{ $product->links('pagination::bootstrap-4') }}
  @endsection
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
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
