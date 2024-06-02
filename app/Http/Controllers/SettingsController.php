<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $version = config('app.version');
        return view('admin.settings.index');
    }
}
