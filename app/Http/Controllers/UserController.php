<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data['user'] = User::all();
        return view('user_manag', $data);
    }

    public function store()
    {
        $validate = request()->validate([
            'name' => 'required|unique:users',
            'email' => 'required',
            'role' => 'required'
        ]);
        $validate['password'] = Hash::make('password');
        User::create($validate);
        return redirect('/user-management')->with('message', 'Data user berhasil disimpan');
    }

    public function reset($id)
    {
        User::where('id', $id)->update(['password' => Hash::make('password')]);
        return redirect('/user-management')->with('message', 'Password berhasil direset');
    }
}
