<?php

namespace App\Http\Controllers;

use App\Models\CategoryConcert;
use App\Models\Company;
use App\Models\Concert;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ConcertController extends Controller
{
    public function allIndex(Request $request)
    {
        // Handling input search
        $eventSearch = $request->event;
        $dateAfter = Carbon::now('Asia/Jakarta');

        // $dateAfter = now();
        $upcomingConcerts = Concert::with('company', 'tickets', 'categories')
            ->where('tanggal', '>', $dateAfter)
            ->where(function ($query) use ($eventSearch) {
                $query->where('nama_konser', 'LIKE', '%' . $eventSearch . '%')
                    ->orWhereHas('company', function ($query) use ($eventSearch) {
                        $query->where('nama', 'LIKE', '%' . $eventSearch . '%');
                    });
            })
            ->orWhereHas('categories', function ($query) use ($eventSearch) {
                $query->where('name', 'LIKE', '%' . $eventSearch . '%');
            })
            ->paginate(8);


        $upcomingConcerts->each(function ($concert) {
            $cheapestTicketPrice = $concert->tickets->min('harga');
            $concert->cheapestTicketPrice = $cheapestTicketPrice;
        });

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->email_verified_at != null) {
                $userProfile = UserProfile::where('user_id', $user->id)->first();
                return view('jelajah', compact('userProfile', 'upcomingConcerts', 'eventSearch'));
            }
        }

        return view('jelajah', compact('upcomingConcerts', 'eventSearch'));
    }

    public function index(Request $request)
    {
        $eventSearch = $request->event;
        $dateAfter = now();

        if ($eventSearch) {
            $upcomingConcerts = Concert::with('company', 'tickets')
                ->where('tanggal', '>', $dateAfter)
                ->where(function ($query) use ($eventSearch) {
                    $query->where('nama_konser', 'LIKE', '%' . $eventSearch . '%')
                        ->orWhereHas('company', function ($query) use ($eventSearch) {
                            $query->where('nama', 'LIKE', '%' . $eventSearch . '%');
                        });
                })->get();

            $sortedUpcomingConcerts = $upcomingConcerts->sortBy('tanggal');

            $sortedUpcomingConcerts->each(function ($concert) {
                $cheapestTicketPrice = $concert->tickets->min('harga');
                $concert->cheapestTicketPrice = $cheapestTicketPrice;
            });

            $companiesShow = Company::all();

            // Mengambil tipe-tipe category.
            $categoriesShow = CategoryConcert::all();

            // Mengambil semua nama tempat di db.
            $uniquePlaces = $upcomingConcerts->pluck('tempat')->unique();

            if (Auth::check()) {
                $user = Auth::user();
                if ($user->email_verified_at != null) {
                    $userProfile = UserProfile::where('user_id', $user->id)->first();
                    return view('home', compact('userProfile', 'sortedUpcomingConcerts', 'eventSearch', 'companiesShow', 'categoriesShow', 'uniquePlaces', 'upcomingConcerts'));
                }
            }
            return view('home', compact('upcomingConcerts', 'eventSearch', 'companiesShow', 'categoriesShow', 'uniquePlaces', 'upcomingConcerts'));
        }

        $upcomingConcerts = Concert::with('company', 'tickets')
            ->where('tanggal', '>', $dateAfter)
            ->get();

        $sortedUpcomingConcerts = $upcomingConcerts->sortBy('tanggal');

        $concertsWithBanners = $sortedUpcomingConcerts->filter(function ($concert) {
            return $concert->banner;
        });
        $randomConcertsBanner = $concertsWithBanners->random(7);

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

        $companiesShow = Company::all();

        // Mengambil tipe-tipe category.
        $categoriesShow = CategoryConcert::all();

        // Mengambil semua nama tempat di db.
        $uniquePlaces = $upcomingConcerts->pluck('tempat')->unique();

        if (Auth::check()) {
            // Pengguna sudah login dan verify
            $user = Auth::user();
            if ($user->email_verified_at != null) {
                $userProfile = UserProfile::where('user_id', $user->id)->first();
                return view('home', compact('userProfile', 'sortedUpcomingConcertsUnique', 'favoriteConcerts', 'companiesShow', 'categoriesShow', 'uniquePlaces', 'sortedUpcomingConcerts', 'upcomingConcerts', 'randomConcertsBanner'));
            }
        }
        return view('home', compact('sortedUpcomingConcertsUnique', 'favoriteConcerts', 'companiesShow', 'categoriesShow', 'uniquePlaces', 'sortedUpcomingConcerts', 'upcomingConcerts', 'randomConcertsBanner'));
    }

    public function show($name)
    {
        $requestName = $name;
        $name = str_replace('-', ' ', $name) . '.';

        $selectedConcert = Concert::with(['company', 'tickets' => function ($query) {
            $query->orderBy('harga', 'asc');
        }])->where('nama_konser', $name)->firstOrFail();

        $selectedConcert->tickets->each(function ($ticket) {
            $cheapestTicketPrice = $ticket->harga;
            $ticket->cheapestTicketPrice = $cheapestTicketPrice;
        });

        $selectedCompanyData = optional(Company::find($selectedConcert->company_id));

        if (Auth::check()) {
            // Pengguna sudah login dan verify
            $user = Auth::user();

            if ($user->email_verified_at !== null) {
                $userProfile = UserProfile::where('user_id', $user->id)->first();

                return view('detail_konser', compact('userProfile', 'selectedConcert', 'selectedCompanyData', 'requestName'));
            }
        }

        return view('detail_konser', compact('selectedConcert', 'selectedCompanyData', 'requestName'));
    }
}
