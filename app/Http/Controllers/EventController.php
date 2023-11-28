<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(){
        if (Auth::check()) {
            // Pengguna sudah login dan verify
            $user = Auth::user();
            if($user->email_verified_at != null){
                $userProfile = UserProfile::where('user_id', $user->id)->first();
                return view('home', compact('userProfile'));
            }
        }
        return view('home');
    }
}
