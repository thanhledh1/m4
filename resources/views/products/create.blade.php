<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@extends('masteradmin')
@section('content')
<div class="col-md-8 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Create Form</h4>
        <form  action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <label for="name">{{ __('message.name_customer') }}:</label>
            <input class="form-control" type="text" name="name" id="" value="{{ old('name') }}"><br>
            @error('name')
                <div style="color: red">{{ $message }}</div>
            @enderror

            <label for="">slug:</label>
            <input class="form-control" type="text" name="slug" id="" value="{{ old('slug') }}"><br>
            @error('slug')
                <div style="color: red">{{ $message }}</div>
            @enderror

            <label for="">{{ __('message.price') }}:</label>
            <input class="form-control" type="number" name="price" id="" value="{{ old('price') }}"><br>
            @error('price')
                <div style="color: red">{{ $message }}</div>
            @enderror

            <label for="description">{{ __('message.description') }}:</label>
            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea><br>
            @error('description')
                <div style="color: red">{{ $message }}</div>
            @enderror

            <label for="">{{ __('message.quantity') }}:</label>
            <input class="form-control" type="number" name="quantity" id="" value="{{ old('quantity') }}"><br>
            @error('quantity')
                <div style="color: red">{{ $message }}</div>
            @enderror

            <label for="status">{{ __('message.status') }}:</label>
            <select class="form-select" name="status" id="status">
                <option value="1" >Còn hàng</option>
                <option value="0">Hết hàng</option>
            </select>
            @error('status')
                <div style="color: red">{{ $message }}</div>
            @enderror <br>

            <label for="">{{ __('message.image') }}:</label>
            <input class="form-control" type="file" name="image" id="image"><br>


            <label  for="category">{{ __('message.category') }}:</label>
            <select class="form-select" name="category_id" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select><br>

            <input type="submit" value="GỬI">
        </form>
    </div>
</div>
</div>
@endsection


@section('js_custom')
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error =>{
                console.log(error);
        });

</script>
@endsection

