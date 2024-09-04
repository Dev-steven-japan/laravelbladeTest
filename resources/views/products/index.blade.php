@extends('layouts')

@section('content')
    <h1>Products</h1>
    <a href="{{ route('products.create') }}">Create New Product</a>
    <ul>
        @foreach ($products as $product)
            <li>
                <strong>{{ $product->name }}</strong> - {{ $product->price }} USD -
                Owner: {{ $product->user->name }} -
                @if ($product->liked)
                    <span>Liked</span>
                @else
                    <form action="{{ route('products.like', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit">Like</button>
                    </form>
                @endif
                <a href="{{ route('products.show', $product->id) }}">View</a>
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
