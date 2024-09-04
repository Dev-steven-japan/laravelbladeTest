@extends('layouts')

@section('content')
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required>
        <label for="user_id">User:</label>
        <select name="user_id" id="user_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <button type="submit">Create</button>
    </form>
@endsection
