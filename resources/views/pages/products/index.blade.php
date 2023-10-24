@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-2">All Data Products</h4>
    <a href="{{ route('product.create') }}" class="btn btn-primary px-4">Create New Data</a>

    <div class="table-responsive mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <img src="{{ url('storage/' .$product->image) }} " alt="">
                        </td>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            Rp. {{ number_format($product->price) }}
                        </td>
                        <td>
                            {{ number_format($product->stock) }}
                        </td>
                        <td>
                            {{ $product->Description }}
                        </td>
                        <td>
                            <a href="{{ route('product.edit', $product->id)}}"
                                class="btn btn-warning">Edit</a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" onclick="confirm('do you want to delete this data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
