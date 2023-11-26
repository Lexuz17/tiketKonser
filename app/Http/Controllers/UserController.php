<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function create(){
        return view('register_profile');
    }

    // Insert to DB
    public function store(Request $request){
        // Cara manual
        $user = Auth::user();
        $post = new UserProfile(); //membuat model baru.
        $post->user_id = $user->id;
        $post-> nama_depan = $request-> firstName;
        $post-> gambar = 'sss';
        $post->nama_belakang = $request-> lastName;
        $post->no_telp = $request->noTelp;
        $post->gender = $request->gender;
        $post->dob = $request->dob;
        $post->save();

        // Flash Message
        if($post){
            Session::flash('status', 'success');
            Session::flash('message', 'Add New Profile Success');
        }

        return redirect('/');

        // Menggunakan mass assignment.
        // $user->create($request->all());
    }

    // Update
    public function edit(Request $request){ //Show
        $user = Auth::user();
        $user_origin = UserProfile::where('user_id', $user->id)->firstOrFail();

        return view('profile_edit', ['user_email' => $user->email, 'user_origin' => $user_origin]);
    }

    public function update(Request $request){ //update to db
        $user = Auth::user();
        $userProfile = UserProfile::where('user_id', $user->id)->firstOrFail();

        // Update atribut pada model UserProfile
        $userProfile->nama_depan = $request->firstName;
        $userProfile->gambar = 'sss'; // Mungkin Anda ingin mengganti dengan logika update gambar
        $userProfile->nama_belakang = $request->lastName;
        $userProfile->no_telp = $request->noTelp;
        $userProfile->gender = $request->gender;
        $userProfile->dob = $request->dob;

        // Simpan perubahan
        $userProfile->save();

        return redirect('/');
    }


}
