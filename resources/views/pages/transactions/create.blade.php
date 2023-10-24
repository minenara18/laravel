@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-5">Create New Trasnsaction</h4>

    <form action="{{ route('transaction.store')}}" method="post">
        @csrf

        <div class="mb-3">
            <label for="product">Product</label>
            <select name="product_id" id="product" class="form-control" required>
                @foreach ($products as $item)
                    <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->stock }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <Label for="quantity">Quantity</Label>
            <input type="number" name="quantity" class="form-control" id="quantity" required>
        </div>
        @if (session('eror'))
            <div class="alert alert-danger mb-3">
                {{ session('eror') }}
            </div>
        @endif
        <div class="d-flex align-item-center gap-2">
            <button class="btn btn-primary px-3" type="submit">Save</button>
            <a href="{{ route('transaction.index')}}" class="btn btn-secondary px-3">Back</a>
        </div>
    </form>
</div>
@endsection
