<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update()
    {
        $this->validate(request(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.Sentinel::getUser()->id,
        ]);

        Auth::update(Auth::getUser(), request()->all());

        flash()->success('Success!', 'Profile successfully updated.');

        return redirect()->back();
    }

    public function editPassword()
    {
        return view('profile.password.edit');
    }

    public function updatePassword()
    {
        $this->validate(request(), [
            'current_password' => 'required|passcheck',
            'password' => 'required|confirmed|min:6',
        ]);

        User::find(Auth::user()->id)->update(['password' => bcrypt(request('password'))]);

        return redirect()->back()->with('success', 'Password successfully updated.');
    }
}
