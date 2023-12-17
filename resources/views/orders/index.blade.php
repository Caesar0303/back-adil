@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Orders</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Add New Order</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Client ID</th>
                <th>Date of Purchase</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->product_id }}</td>
                    <td>{{ $order->client_id }}</td>
                    <td>{{ $order->dateBuy }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
