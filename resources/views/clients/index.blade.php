@extends('layouts.app')

@section('content')
    <h1>Clients</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-2">Add New Client</a>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->firstName }}</td>
                    <td>{{ $client->lastName }}</td>
                    <td>
                        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
