<?php

namespace App\Http\YoRHaControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function landing()
    {
        return view('operations.landing');
    }

    public function loginForm()
    {
        return view('operations.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'unit_id'    => 'required|string|max:50',
            'access_key' => 'required|string|min:6',
        ]);

        // Store simple session flag, no DB needed.
        session([
            'yorha_authenticated' => true,
            'yorha_unit_id'       => $request->unit_id,
        ]);

        return redirect()->route('bunker.index');
    }

    public function registerForm()
    {
        return view('operations.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'unit_id'    => 'required|string|max:50',
            'unit_type'  => 'required|string',
            'access_key' => 'required|string|min:6|confirmed',
        ]);

        // Fake registration; just log in immediately.
        session([
            'yorha_authenticated' => true,
            'yorha_unit_id'       => $request->unit_id,
            'yorha_unit_type'     => $request->unit_type,
        ]);

        return redirect()->route('bunker.index')
            ->with('status', "Unit {$request->unit_id} initialized. Welcome to YoRHa.");
    }

    public function logout()
    {
        session()->forget(['yorha_authenticated', 'yorha_unit_id', 'yorha_unit_type']);
        return redirect()->route('landing');
    }
}