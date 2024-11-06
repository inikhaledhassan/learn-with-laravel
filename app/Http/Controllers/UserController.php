<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('add_user');
    }

    public function updateUser(Request $request)
    {
        $userId = $request->id;
        $user = User::where('id', $userId)->first();
        return view('update_user', compact('user'));
    }


    public function viewUser()
    {
        $users = User::all();
        return view('view_user', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $first = new User();
        $first->name = $request->input('name');
        $first->email = $request->input('email');
        $first->password = Hash::make($request->input('password'));
        $first->save();

        if ($request->hasFile('image')) {
            $first->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->back()->with('success', 'User added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $first = User::findOrFail($id);
        $first->name = $request->input('name');
        $first->email = $request->input('email');
        $first->save();

        if ($request->hasFile('image')) {

            if ($first->hasMedia('images')) {
                $first->clearMediaCollection('images');
            }

            $first->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect('/view')->with('success', 'User updated successfully!');
    }

    public function delete(Request $request, $id)
    {

        $first = User::findOrFail($id);
        $first->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}
