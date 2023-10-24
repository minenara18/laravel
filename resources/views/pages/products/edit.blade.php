@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-5">Edit Data {{ $product->title }}</h4>

    <form action="{{ route('product.update', $product->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="image">image</label>
            <input type="file" accept="image/*" name="image" class="from-control" id="image">
            <span class="text-secondary">If you don't want to change the image, you don't need to fill it in!</span>
        </div>
        <div class="mb-3">
            <Label for="name">Product Name</Label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <Label for="price">Product Price</Label>
            <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}" required>
        </div>
        <div class="mb-3">
            <Label for="stock">Product Stock</Label>
            <input type="number" name="stock" class="form-control" id="stock" value="{{ $product->stock }}" required>
        </div>
        <div class="mb-3">
            <Label for="price">Description</Label>
            <textarea name="Description" id="description" cols="30" rows="5" class="form-control" required>{{ $product->description }}"</textarea>
        </div>
        <div class="d-flex align-item-center gap-2">
            <button class="btn btn-primary px-3" type="submit">save changes</button>
            <a href="{{ route('product.index')}}" class="btn btn-secondary px-3">Back</a>
        </div>
    </form>
</div>
@endsection
