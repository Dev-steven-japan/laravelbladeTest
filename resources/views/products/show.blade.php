@extends('layouts')

@section('title', 'Product Details')

@section('content')
    <div class="container">
        <h1 class="mb-4">Product Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                <p class="card-text"><strong>Owner:</strong> {{ $product->user->name }}</p>

                @if ($product->description)
                    <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
                @endif

                <div class="mt-3">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
@endsection
