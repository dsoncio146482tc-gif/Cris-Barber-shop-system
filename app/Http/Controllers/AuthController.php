<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register', ['hasAdmin' => User::where('role', 'admin')->exists()]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'role' => ['required', 'in:admin,barber'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $hasAdmin = User::where('role', 'admin')->exists();

        if ($hasAdmin && ! Auth::check()) {
            abort(403, 'An administrator must create additional accounts.');
        }

        if ($hasAdmin && Auth::user()->role !== 'admin') {
            abort(403);
        }

        if ($data['role'] === 'admin' && $hasAdmin) {
            return back()->withErrors(['role' => 'Only one administrator account may be created.'])->withInput();
        }

        $user = User::create($data);

        if ($user->role === 'barber') {
            $name = preg_split('/\s+/', trim($user->name), 2);

            Barber::create([
                'user_id' => $user->id,
                'first_name' => $name[0],
                'last_name' => $name[1] ?? '-',
                'hired_date' => today(),
                'status' => 'active',
            ]);
        }

        if (! $hasAdmin) {
            Auth::login($user);
            $request->session()->regenerate();
        }

        return redirect()->route('dashboard')->with('status', $user->role === 'barber' ? 'Barber account created.' : 'Administrator account created.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->onlyInput('email');
        }

        $request->session()->regenerate();
        $request->user()->update(['last_login_at' => now()]);

        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
