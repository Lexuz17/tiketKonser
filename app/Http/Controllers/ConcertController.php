<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConcertController extends Controller
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

    // public function index()
    // {
    //     $events = Event::all();
    //     return view('events', compact('events'));
    // }

    public function cart()
    {
        return view('cart');
    }

    // public function addToCart($id)
    // {
    //     $event = Event::findOrFail($id);

    //     $cart = session()->get('cart', []);

    //     if(isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     }  else {
    //         $cart[$id] = [
    //             "event_name" => $event->event_name,
    //             "photo" => $event->photo,
    //             "price" => $event->price,
    //             "quantity" => 1
    //         ];
    //     }

    //     session()->put('cart', $cart);
    //     return redirect()->back()->with('success', 'Event add to cart successfully!');
    // }
}
