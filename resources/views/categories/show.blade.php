@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Edit Category</a>
    <form action="{{ route('categories.destroy', $category) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
