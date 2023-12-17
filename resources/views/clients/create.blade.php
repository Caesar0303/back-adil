@extends('layouts.app')

@section('content')
    <h1>Add Client</h1>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" class="form-control">
        </div>

        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Client</button>
    </form>
@endsection
