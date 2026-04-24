<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdduserController extends Controller
{
    // Show the registration form
    public function showRegister()
    {
        return view('register'); // your Blade file
    }

    // Handle registration
    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|string|email|max:255|unique:users,email',
            'country_code' => 'required|string|max:5',
            'phone'        => 'required|string|max:15',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:9048',
            'password'     => 'required|string|min:8|confirmed',
        ]);

        // Store Image or use default
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profiles', 'public');
        } else {
            $imagePath = 'default.png'; // make sure you have public/storage/default.png
        }

        // Create User
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->country_code . $request->phone,
            'image'    => $imagePath,
            'password' => Hash::make($request->password),
        ]);

        // Login User
        Auth::login($user);

        return redirect()->route('dashboard')
                         ->with('success', 'Account created successfully!');
    }
}

