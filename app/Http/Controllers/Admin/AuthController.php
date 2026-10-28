<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'identifier' => ['required', 'string'],
            'password'   => ['required', 'string'],
        ]);

        $field = filter_var($data['identifier'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$field => $data['identifier'], 'password' => $data['password']], $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()
            ->withErrors(['identifier' => 'Email/username atau password salah.'])
            ->onlyInput('identifier');
    }

    public function showRegister()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $identifier = (string) $request->input('identifier');
        $isEmail    = filter_var($identifier, FILTER_VALIDATE_EMAIL) !== false;
        $field      = $isEmail ? 'email' : 'username';

        $data = $request->validate([
            'identifier' => [
                'required', 'string', 'max:255',
                $isEmail ? 'email' : 'alpha_dash',
                Rule::unique('users', $field),
            ],
            'password' => ['required', 'string', 'min:8'],
        ], [
            'identifier.unique'     => 'Email/username sudah terdaftar.',
            'identifier.alpha_dash' => 'Username hanya boleh huruf, angka, strip, dan underscore.',
            'password.min'          => 'Password minimal 8 karakter.',
        ]);

        $user = User::create([
            $field     => $data['identifier'],
            'password' => $data['password'],
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}