@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Order</h1>
    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_id">Product ID</label>
            <input type="number" name="product_id" value="{{ $order->product_id }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="client_id">Client ID</label>
            <input type="number" name="client_id" value="{{ $order->client_id }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="dateBuy">Date of Purchase</label>
            <input type="datetime-local" name="dateBuy" value="{{ $order->dateBuy }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Order</button>
    </form>
</div>
@endsection
