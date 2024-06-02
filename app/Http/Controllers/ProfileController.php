<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profil.index', compact('user'));
    }

    public function update_nama(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->nama = $request->nama;
        $user->save();

        return redirect()->route('profil')->with('success', 'Profile name updated successfully');
    }

    public function update_phone(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:15',
        ]);

        $user = Auth::user();
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('profil')->with('success', 'Profile phone updated successfully');
    }
}
