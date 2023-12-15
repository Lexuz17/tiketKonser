<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Mail\TestSendingEmail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function login(){
        return view('login');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return redirect()->back()->with('status', 'error')->with('message', 'Email atau kata sandi salah. Silakan coba lagi.');
    }

    public function register(){
        return view('register');
    }

    public function registerProcess(UserCreateRequest $request){
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        // Send registration confirmation email
        // Mail::to($user->email)->send(new TestSendingEmail($user));

        // Redirect or perform other actions after registration
        return redirect('/email/verify');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
