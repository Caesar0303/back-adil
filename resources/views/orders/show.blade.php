@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order Details</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Product ID</th>
                            <td>{{ $order->product_id }}</td>
                        </tr>
                        <tr>
                            <th>Client ID</th>
                            <td>{{ $order->client_id }}</td>
                        </tr>
                        <tr>
                            <th>Date of Purchase</th>
                            <td>{{ $order->dateBuy }}</td>
                        </tr>
                    </table>
                    
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
