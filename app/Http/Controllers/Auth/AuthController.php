<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

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
    public function logout()
    {
        session()->flush();
        return redirect()->to(route("login"));
    }
}
