<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);
        
        if(
            Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])
        )
        {
            if($request->user()->level == 'Administrator')
            {
                return redirect()->route('admin.utama');
            }
            else if($request->user()->level == 'Operator')
            {
                return redirect()->route('operator.utama');
            }
        }
        else
        {
            return redirect()->back()->with('message', 'Email atau Password Salah');
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
