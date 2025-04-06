<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Models\LoginLog;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();

            LoginLog::create([
                'user_id' => Auth::user()->user_id,
                'logname' => 'login',
                'user_ip' => $request->ip(),
                'user_pc' => $request->getHost(),
                'login_date' => now(),
                'login_time' => now(),
                'added_date' => now(),
                'session_id' => session()->getId(), 
                'status' => 'Success', // Login success
            ]);

            return redirect()->intended(RouteServiceProvider::HOME);
        } catch (\Exception $e) {

            LoginLog::create([
                'user_id' => null, // No user authenticated for failed login
                'logname' => 'login',
                'user_ip' => $request->ip(),
                'user_pc' => $request->getHost(),
                'login_date' => now(),
                'login_time' => now(),
                'added_date' => now(),
                'session_id' => session()->getId(), 
                'status' => 'failed', // Login failed
            ]);

            // Change this line to use withErrors instead of with
            return redirect()->route('login')
                ->withErrors([
                    'username' => 'The provided credentials do not match our records.',
                    'password' => 'Invalid password provided.'
                ]);
        }
    }

   
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if (Auth::check()) {
            LoginLog::create([
                'user_id' => Auth::user()->user_id,
                'logname' => 'logout',
                'user_ip' => $request->ip(),
                'user_pc' => $request->getHost(),
                'logout_date' => now(),
                'logout_time' => now(),
                'added_date' => now(),
                'session_id' => session()->getId(), 
                'status' => 'Active', // Login failed
            ]);
        }

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
