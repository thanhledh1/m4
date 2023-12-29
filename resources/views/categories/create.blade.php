@extends('masteradmin')
@section('content')
    <div class="container-fluid">
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <label for="name"><th scope="col">{{ __('message.Product_company') }}</th>
                :</label>
            <input type="text" name="name" id="name"><br>

    @error('name')
            <div style="color: red">{{ $message }}</div>
        @enderror

            <input type="submit" value="SUBMIT">
        </form>
    </div>
@endsection
