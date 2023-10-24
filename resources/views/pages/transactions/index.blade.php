@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-2">All Transaction Products</h4>
    <a href="{{ route('transaction.create') }}" class="btn btn-primary px-4">Create New Transaction</a>

    <div class="table-responsive mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $item)
                    <tr>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ number_format($item->quantity) }}
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            <form action="{{ route('transaction.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
