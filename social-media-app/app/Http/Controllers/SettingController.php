<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function updatepassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:8|confirmed',
   
    ]);
     Auth::user()->update([
        'password' => bcrypt($request->new_password),
    ]);

    return back()->with('success', 'Password updated successfully.');
}
public function updateProfile(Request $request)
{
    // Update profile information
    $request->validate([
        'name' => 'required|string|nullable|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
    ]);
    Auth::user()->update($request->only('name', 'email'));

    return back()->with('success', 'Profile updated successfully.');
}

}
