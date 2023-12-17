@extends('layouts.app')

@section('content')
    <h1>Client Details</h1>
    <p><strong>First Name:</strong> {{ $client->firstName }}</p>
    <p><strong>Last Name:</strong> {{ $client->lastName }}</p>
    <a href="{{ route('clients.index') }}" class="btn btn-primary">Back to Clients</a>
@endsection
