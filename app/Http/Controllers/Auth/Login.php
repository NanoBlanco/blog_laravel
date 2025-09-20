<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // validate the input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // attempt to log in
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Regenerate session for security
            $request->session()->regenerate();

            //Redirect to intended page or home
            return redirect()->intended('/')->with('success', 'Bienvenido');
        }

        // if login fails, redirect back with error
        return back()->withErrors(['email' => 'Las credenciales no son correctas.'])->onlyInput('email');
            
    }
}
