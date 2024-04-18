<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return redirect()->route('contacts.index');
        }
    }

    public function registerView()
    {
        return view('register');
    }

    public function registerAction(RegisterRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('thank-you');
    }

    public function logout() {
        Auth::logout();

        return redirect("/");
    }
}
