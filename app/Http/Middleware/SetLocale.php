<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locales = Config::get('app.locales', []);

        if (Session::has('locale') && array_key_exists(Session::get('locale'), $locales)) {
            App::setLocale(Session::get('locale'));
        }

        return $next($request);
    }
}
