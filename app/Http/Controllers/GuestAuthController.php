<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class GuestAuthController extends Controller
{
    /**
     * Show the guest registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('guests.register');
    }

    /**
     * Handle a guest registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // 1. Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:guests',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' checks for password_confirmation field
            'phone' => 'nullable|string|max:30',
            'date_of_birth' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // 2. Create the new Guest in the database
        $guest = Guest::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password securely
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
        ]);

        // 3. Log the new guest in automatically after registration
        Auth::guard('guest')->login($guest);

        // 4. Redirect the guest to a protected page, like their dashboard
        return redirect()->route('guest.dashboard')->with('success', 'Registration successful!');
    }

    /**
     * Show the guest login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('guests.login');
    }

    /**
     * Handle a guest login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. Validate the login credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Attempt to authenticate the guest using the 'guest' guard
        if (Auth::guard('guest')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            // 3. Redirect to the intended page or dashboard on successful login
            return redirect()->intended(route('guest.dashboard'))->with('success', 'Login successful!');
        }

        // 4. If authentication fails, throw an error
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    /**
     * Log the guest out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('guest')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out.');
    }

    /**
     * Show the guest dashboard (protected page).
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // This method will only be accessible to logged-in guests
        return view('guests.dashboard');
    }
}

