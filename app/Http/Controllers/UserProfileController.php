<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.user.courses');
    }

    public function show($username)
    {
        $data = User::where('username', $username)->with(['courses' => function ($query) {
            $query->withPivot(['is_completed', 'progress', 'score']);
        }])->first();

        return view('dashboard.user.profile', compact('data'));
    }
    
    public function edit($username)
    {
        $data = User::where('username', $username)->first();

        return view('dashboard.user.edit', compact('data'));
    }

    public function update(Request $request, $username)
    {
        $user = User::where('username', $username)->first();

        $rules = [];

        if ($request->name !== $user->name) {
            $rules['name'] = 'required|max:255';
        }
        
        // if ($request->username !== $user->username) {
        //     $rules['username'] = 'required|max:255|unique:users';
        // }

        if ($request->file('image')) {
            $rules['image'] = 'file|image|mimes:jpg,png,jpeg,webp|max:1024';
        }
        
        $validatedData = $request->validate($rules);
        
        if ($request->file('image')) {
            if ($request->old_image) {
                Storage::delete($request->old_image);
            }

            $validatedData['image'] = $request->file('image')->store('user-pictures');
        }

        $user->update($validatedData);

        return redirect('/users/'.auth()->user()->username.'/dashboard/profile')->with('success', 'Your profile has been updated!');
    }
}
