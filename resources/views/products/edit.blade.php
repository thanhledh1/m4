@extends('masteradmin')
@section('content')
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Form</h4>

                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label for="name">{{ __('message.name_customer') }}:</label>
                    <input class="form-control" type="text" name="name" id=""
                        value="{{ old('name', $product->name) }}">
                    @error('name')
                        <div style="color: red">{{ $message }}</div>
                    @enderror
                    <br>
                    <label for="slug">Slug:</label>
                    <input class="form-control" type="text" name="slug" id=""
                        value="{{ old('slug', $product->slug) }}">
                    @error('slug')
                        <div style="color: red">{{ $message }}</div>
                    @enderror
                    <br>
                    <label for="price">{{ __('message.price') }}:</label>
                    <input class="form-control" type="number" name="price" id=""
                        value="{{ old('price', $product->price) }}">
                    @error('price')
                        <div style="color: red">{{ $message }}</div>
                    @enderror
                    <br>

                    <label for="description">{{ __('message.description') }}:</label>
                    <textarea class="form-control" type="text" id="description" name="description"
                        value="{!! old('description', $product->description) !!}"></textarea>
                    @error('description')
                        <div style="color: red">{{ $message }}</div>
                    @enderror
                    <br>
                    <label for="quantity">{{ __('message.quantity') }}:</label>
                    <input class="form-control" type="number" name="quantity" id=""
                        value="{{ old('quantity', $product->quantity) }}">
                    @error('quantity')
                        <div style="color: red">{{ $message }}</div>
                    @enderror
                    <br>
                    <label for="status">{{ __('message.status') }}:</label>
                    <select class="form-select" name="status" id="status">
                        <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Còn hàng
                        </option>
                        <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Hết hàng
                        </option>
                    </select>
                    @error('status')
                        <div style="color: red">{{ $message }}</div>
                    @enderror
                    <br>
                    <label for="image">{{ __('message.image') }}:</label>
                    <input class="form-control" type="file" name="image" id="image" value="{{ $product->image }}">
                    @error('image')
                        <div style="color: red">{{ $message }}</div>
                    @enderror
                    <br>
                    <label for="category">{{ __('message.category') }}:</label>
                    <select class="form-select" name="category_id" id="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div style="color: red">{{ $message }}</div>
                    @enderror
                    <br>

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
            .catch(error => {
                console.log(error);
            });
    </script>
@endsection
