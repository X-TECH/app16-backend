<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Auth/Login', [
            'hello' => 'world',
        ]);
    }
}
