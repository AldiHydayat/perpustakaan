<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect()->route('admin.utama');
    }

    public function destroy(User $user)
    {
        User::where('id', $user->id)
            ->delete();
        return redirect()->route('admin.utama')->with('message', 'Data Berhasil Dihapus');
    }
}
