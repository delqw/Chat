<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        $name = $request->get('name');
        if (strlen($name) < 3) return response([], 403);
        $user = User::firstOrCreate($name);
        Auth::login($user);
        return $user;
    }
}
