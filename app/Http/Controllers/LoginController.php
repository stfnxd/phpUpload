<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        
        return view('livewire.login');
    }

    public function login(Request $request)
    {
        // Valideringsregler
        $rules = [
            'password' => 'required|string',
        ];

        // Tilpas fejlmeddelelser
        $messages = [
            'password.required' => 'Adgangskode skal udfyldes.',
        ];

        // Udfør validering
        $request->validate($rules, $messages);

        // Forsøg at logge ind
        $credentials = $request->only('password');

        if (Auth::attempt($credentials)) {
            // Brugeren er logget ind
            return redirect()->intended('/');
        } else {
            // Brugeren kunne ikke logges ind
            return redirect()->route('login')->with('error', 'Forkert brugernavn eller adgangskode.');
        }
    }
}
