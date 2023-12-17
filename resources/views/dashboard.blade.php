@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if(Auth::check())
   <p>Welcome, {{ Auth::user()->name }}</p>
@else
   <p>Welcome, Guest</p>
@endif

                    <p>I made it out of my tears</p>

                   
                    <a href="{{ route('clients.index') }}" class="btn btn-primary">Manage Clients</a>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Manage Orders</a>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Manage Products</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Manage Categories</a>

                    
                    <div id="contentArea"></div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
