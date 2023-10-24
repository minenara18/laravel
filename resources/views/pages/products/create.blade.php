@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-5">Create New Products</h4>

    <form action="{{ route('product.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <label for="image">image</label>
            <input type="file" accept="image/*" name="image" class="from-control" id="image" required>
        </div>
        <div class="mb-3">
            <Label for="name">Product Name</Label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
            <Label for="price">Product Price</Label>
            <input type="number" name="price" class="form-control" id="price" required>
        </div>
        <div class="mb-3">
            <Label for="stock">Product Stock</Label>
            <input type="number" name="stock" class="form-control" id="stock" required>
        </div>
        <div class="mb-3">
            <Label for="price">Description</Label>
            <textarea name="Description" id="description" cols="30" rows="5" class="form-control" required></textarea>
        </div>
        <div class="d-flex align-item-center gap-2">
            <button class="btn btn-primary px-3" type="submit">Save</button>
            <a href="{{ route('product.index')}}" class="btn btn-secondary px-3">Back</a>
        </div>
    </form>
</div>
@endsection
