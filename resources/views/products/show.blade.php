@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product Details</h2>
    <p><strong>Name:</strong> {{ $product->name }}</p>
    <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
    <p><strong>Price:</strong> {{ $product->price }}</p>
    <p><strong>Category:</strong> {{ $product->category->name }}</p>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
