<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public  function register(Request $request)
    {
        $incomingField = $request->validate([
            'username' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6', 'max:255'],
        ]);

        dd($incomingField);
        return "KAMALLLLLL";
    }
}