@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Product</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Quantity:</label>
            <input type="number" name="quantity" class="form-control">
        </div>
        <div class="form-group">
            <label>Price:</label>
            <input type="number" step="0.01" name="price" class="form-control">
        </div>
        <div class="form-group">
            <label>Category:</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
@endsection
