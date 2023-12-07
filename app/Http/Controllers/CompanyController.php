<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Concert;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index($id){
        $nowJakarta = Carbon::now('Asia/Jakarta');
        $company = Company::with('concerts')->where('id', $id)->first();

        // Mendapatkan koleksi konser terkait
        $companyConcerts = $company->concerts;

        $activeConcerts = $companyConcerts->filter(function ($concert) use ($nowJakarta) {
            return $concert->tanggal >= $nowJakarta;
        })->sortBy('tanggal');

        $pastConcerts = $companyConcerts->filter(function($concert) use ($nowJakarta){
            return $concert->tanggal < $nowJakarta;
        });

        // Menghitung harga tiket termurah untuk setiap konser
        $activeConcerts->each(function ($concert) {
            $cheapestTicketPrice = $concert->tickets->min('harga');
            $concert->cheapestTicketPrice = $cheapestTicketPrice;
        });

        $pastConcerts->each(function ($concert) {
            $cheapestTicketPrice = $concert->tickets->min('harga');
            $concert->cheapestTicketPrice = $cheapestTicketPrice;
        });

        if (Auth::check()) {
            // Pengguna sudah login dan verify
            $user = Auth::user();
            if ($user->email_verified_at != null) {
                $userProfile = UserProfile::where('user_id', $user->id)->first();
                return view('companyDetail', compact('userProfile', 'company', 'activeConcerts', 'pastConcerts'));
            }
        }
        return view('companyDetail', compact('company', 'activeConcerts', 'pastConcerts'));
    }
}
