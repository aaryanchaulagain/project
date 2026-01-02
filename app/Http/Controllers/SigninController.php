<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SigninController extends Controller
{
    // Show login page
    public function showLoginForm()
    {
        return view('pages.log'); // points to log.blade.php
    }

    // Handle login
    public function signin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->with('error', 'Email not found!');
    }

    if (!Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Incorrect password!');
    }

    Auth::login($user);

    // Redirect based on role
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'owner') {
        return redirect()->route('owner.dashboard');
    } else {
        return redirect()->route('tenant.dashboard');
    }
}


    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
