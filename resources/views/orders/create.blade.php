@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Order</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Product ID</label>
            <input type="number" name="product_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="client_id">Client ID</label>
            <input type="number" name="client_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="dateBuy">Date of Purchase</label>
            <input type="datetime-local" name="dateBuy" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Order</button>
    </form>
</div>
@endsection
