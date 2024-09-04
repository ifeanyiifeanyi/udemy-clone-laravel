<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index', ['user' => request()->user()]);
    }

    public function updateProfile(Request $request, User $user)
    {
        // dd($request->all());
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username,' . $user->id],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'other_names' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image'],
        ]);



        if ($request->hasFile('photo')) {
            $old_image = $user->photo;

            if (!empty($old_image) && file_exists(public_path($old_image))) {
                unlink(public_path($old_image));
            }

            $thumb = $request->file('photo');
            $extension = $thumb->getClientOriginalExtension();
            $profilePhoto = time() . "." . $extension;
            $thumb->move('admin/profile/', $profilePhoto);
            $user->photo = 'admin/profile/' . $profilePhoto;
        }

        $user->update([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'other_names' => $request->other_names,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return back()->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request, User $user){
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|confirmed|different:current_password|min:6|max:10'
        ]);

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return back()->with('success', 'Password updated successfully!');
    }

}
