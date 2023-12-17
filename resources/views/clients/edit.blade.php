@extends('layouts.app')

@section('content')
    <h1>Edit Client</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" class="form-control" value="{{ $client->firstName }}">
        </div>

        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" class="form-control" value="{{ $client->lastName }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Client</button>
    </form>
@endsection
