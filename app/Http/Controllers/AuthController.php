<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

// use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function update_profile()
    {
        $data['user'] = User::where('id', Auth::user()->id)->first();
        return view('update_profile', $data);
    }

    public function login()
    {
        $req = request()->all();
        unset($req['_token']);
        if (Auth::attempt($req)) {
            return redirect('/');
        } else {
            return redirect()->back()->with('message', 'Email & Password Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function update()
    {
        $req = request()->all();

        if ($req['current_password'] != null) {
            if (!(Hash::check($req['current_password'], Auth::user()->password))) {
                return redirect()->back()->with(['message' => 'Your current password does not matches with the password.', 'color' => 'alert-danger']);
            } else {
                $validate = request()->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'password' => ['required', Password::min(6)->mixedCase()->numbers()]
                ]);
                $validate['password'] = Hash::make($validate['password']);
            }
            // return redirect()->back()->with('message', 'New and Current password is required');
        } else {
            $validate = request()->validate([
                'name' => 'required',
                'email' => 'required'
            ]);
        }
        $validate['updated_at'] = date('Y-m-d H:i:s');
        User::where('id', $req['id'])->update($validate);
        return redirect()->back()->with(['message' => 'Profile data successfully updated', 'color' => 'alert-success']);
    }
}
