<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Show signup page
    public function showRegistrationForm()
    {
        return view('pages.register'); // points to register.blade.php
    }

    // Handle form submission
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:Tenant,owner',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'room_type' => null,
            'rooms_available' => null,
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully!');
    }
}
