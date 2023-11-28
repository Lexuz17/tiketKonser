<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    //
    public function index()
    {
        $events = Event::all();
        return view('events', compact('events'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $event = Event::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "event_name" => $event->event_name,
                "photo" => $event->photo,
                "price" => $event->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Event add to cart successfully!');
    }
}
