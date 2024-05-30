<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswaCount = Mahasiswa::count();
        return view('admin.dashboard.index', compact('mahasiswaCount'));
    }
}
