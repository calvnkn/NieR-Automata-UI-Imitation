<?php

namespace App\Http\YoRHaControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\YoRHaUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    
    // GET /Landing page
    public function landing()
    {
        return view('operations.landing');
    }

    // GET /login
    public function loginForm()
    {
        return view('operations.login');
    }

    /**
     * POST /login
     * Check unit_id + access_key against DB.
     */
    public function login(LoginRequest $request)
    {
        $request->ensureIsNotRateLimited();

        // Find unit in DB by unit_id.
        $unit = YoRHaUnit::where('unit_id', $request->unit_id)->first();

        // Unit not found OR wrong access_key = reject.
        if (!$unit || !$unit->checkAccessKey($request->access_key)) {
            $request->hitRateLimiter();

            throw ValidationException::withMessages([
                'unit_id' => 'Unit ID or access key is incorrect.',
            ]);
        }

        $request->clearRateLimiter();

        session([
            'yorha_authenticated' => true,
            'yorha_unit_id'       => $unit->unit_id,
            'yorha_unit_type'     => $unit->unit_type,
        ]);

        return redirect()->route('bunker.index');
    }

    // GET /register
    public function registerForm()
    {
        return view('operations.register');
    }

    /**
     * POST /register
     * Save new unit to DB.
     */
    public function register(Request $request)
    {
        $request->validate([
            'unit_id'    => ['required', 'string', 'max:50', 'unique:yorha_units,unit_id'],
            'unit_type'  => ['required', 'string'],
            'access_key' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        // Save unit to DB, hash the access_key before storing.
        $unit = YoRHaUnit::create([
            'unit_id'    => $request->unit_id,
            'unit_type'  => $request->unit_type,
            'access_key' => Hash::make($request->access_key),
        ]);

        session([
            'yorha_authenticated' => true,
            'yorha_unit_id'       => $unit->unit_id,
            'yorha_unit_type'     => $unit->unit_type,
        ]);

        return redirect()->route('bunker.index')
            ->with('status', "Unit {$unit->unit_id} initialized. Welcome to YoRHa.");
    }

    /**
     * POST /logout
     */
    public function logout()
    {
        session()->forget(['yorha_authenticated', 'yorha_unit_id', 'yorha_unit_type']);

        return redirect()->route('landing');
    }
}