<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display a listing of users
    public function index()
    {
        $users = User::all(); // Retrieve all users
        return view('users.index', compact('users')); // Pass users to the view
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('users.create');
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        // Validate and create a new user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
        ]);

        User::create($request->all()); // Create the user
        return redirect()->route('users.index'); // Redirect to the users list
    }

    // Display a specific user
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Show the form for editing a user
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update a user in the database
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->all());
        return redirect()->route('users.index');
    }

    // Delete a user from the database
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
