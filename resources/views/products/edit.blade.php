@extends('layouts')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $product->name }}" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ $product->description }}</textarea>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" value="{{ $product->price }}" required>
        <label for="user_id">User:</label>
        <select name="user_id" id="user_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $product->user_id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Update</button>
    </form>
@endsection
