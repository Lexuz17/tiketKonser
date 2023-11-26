<?php

namespace App\Http\Controllers;

use App\Mail\TestSendingEmail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function registerProcess(Request $request){
        $user = User::create([
            // 'name' => $request->firstName,
            // 'no_telp' => $request->noTelp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'nama_lenkap' => $request->lastName,
            // 'gender' => $request->gender,
            // 'dob' => $request->dob
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Send registration confirmation email
        // Mail::to($user->email)->send(new TestSendingEmail($user));

        // Redirect or perform other actions after registration

        return redirect('/email/verify');
    }
}
