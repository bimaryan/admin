<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:10,1')->only('proses');
    }

    public function index()
    {
        return view('admin.auth.login.index');
    }

    public function proses(Request $request)
    {
        // Validate the input
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('phone', 'password'))) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->with('failed', 'Nomer Telepon dan Password Salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil logout');
    }
}
