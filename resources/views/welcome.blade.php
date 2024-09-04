@extends('layouts')

@section('title', 'Welcome to Laravel App')

@section('content')
    <div class="text-center">
        <h1 class="display-4 mb-4">Welcome to Laravel App</h1>
        <p class="lead mb-5">This is a simple application to manage products and users.</p>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg w-100">
                    View Products
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-lg w-100">
                    View Users
                </a>
            </div>
        </div>
    </div>
@endsection
