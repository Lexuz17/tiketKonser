<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{

    public function notice(){
        return view('auth.verify-email');
    }

    public function verify(Request $request){
        $request->user()->markEmailAsVerified();
        return redirect()->route('addProfile');
    }

    public function send(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return "Verifikasi Email berhasil terkirim";
    }
}
