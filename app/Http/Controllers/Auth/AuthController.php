<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view("auth.login");
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($request->safe()->only(["username", "password"]))) {
            $request->session()->regenerate();
            return redirect()->intended(route("home"));
        }
        return back()->withInput()->with("pesan", "username atau password salah");
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route("login"));
    }
    public function register()
    {
        return view("auth.register");
    }
    public function registerProcess(LoginRequest $request, User $user)
    {
        $credentials = $request->validated();
        User::create([
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "email_verified_at" => now(),
            "remember_token" =>  Str::random(10)
        ]);
        return back()->with("sukses", "register berhasil");
    }
}
