<?php

namespace App\Http\Controllers;

use App\Models\CategoryConcert;
use App\Models\Company;
use App\Models\Concert;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConcertController extends Controller
{
    public function index()
    {
        $dateAfter = now();

        $upcomingConcerts = Concert::with('company', 'tickets')
            ->where('tanggal', '>', $dateAfter)
            ->get();

        $sortedUpcomingConcerts = $upcomingConcerts->sortBy('tanggal');

        // Hanya ambil 1 dr setiap perusahaan.
        $uniqueUpcomingConcerts = $upcomingConcerts->unique('company.id')->values();

        // Sort berdasarkan tanggal
        $sortedUpcomingConcertsUnique = $uniqueUpcomingConcerts->sortBy('tanggal')->take(10);

        $upcomingConcerts->each(function ($concert) {
            $cheapestTicketPrice = $concert->tickets->min('harga');
            $concert->cheapestTicketPrice = $cheapestTicketPrice;
        });

        // Mengambil yang jumlah tersediannya paling dikit
        $favoriteConcerts = $upcomingConcerts->sortBy(function ($concert) {
            return $concert->tickets->sum('jumlah_tersedia');
        })->take(3);

        $companiesShow = Company::all()->pluck('logo', 'nama');

        $categoriesShow = CategoryConcert::all();

        $uniquePlaces = $upcomingConcerts->pluck('tempat')->unique();

        if (Auth::check()) {
            // Pengguna sudah login dan verify
            $user = Auth::user();
            if ($user->email_verified_at != null) {
                $userProfile = UserProfile::where('user_id', $user->id)->first();
                return view('home', compact('userProfile', 'sortedUpcomingConcertsUnique', 'favoriteConcerts', 'companiesShow', 'categoriesShow', 'uniquePlaces', 'sortedUpcomingConcerts'));
            }
        }
        return view('home', compact('sortedUpcomingConcertsUnique', 'favoriteConcerts', 'companiesShow', 'categoriesShow', 'uniquePlaces', 'sortedUpcomingConcerts'));
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
