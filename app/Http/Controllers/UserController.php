<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        $data = request()->validate([
            'email'=> 'required',
            'password'=>'required'
        ]);
        if (Auth::attempt($data)) {
                request()->session()->regenerate();
                return redirect()->intended('/');
        }
        else {
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->regenerateToken();
        return redirect('/login');
    }


    public function register(Request $request)

    {
         $request->validate([
            'name'=> 'required|max:255|unique:users',
            'email'=> 'required|unique:users',
            'password'=>'required|min:8'

        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
        ]);
        return redirect('/login')->with('RegisterDone', 'your account has been registered');
    } 
    



}
