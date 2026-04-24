<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show profile edit page
     */
    public function profile()
    {
        return view('editprofile');
    }

    /**
     * Update user profile
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'email', 'unique:users,email,' . $user->id],
            'phone'        => ['required', 'string', 'max:15'],
            'country_code' => ['required', 'string', 'in:+1,+44,+91,+971,+92'],
            'image'        => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'password'     => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        // Prepare update data
        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->country_code . $request->phone,
            
        ];

        // Handle password update (only if provided)
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Handle image upload
        if ($request->hasFile('image')) {

            // Delete old image
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            $path = $request->file('image')->store('profile_images', 'public');
            $data['image'] = $path;
        }

        $user->update($data);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Profile updated successfully.');
    }
}
