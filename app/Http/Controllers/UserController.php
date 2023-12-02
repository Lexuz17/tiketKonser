<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileRequest;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function create(){
        return view('register_profile');
    }

    public function createNotice(){
        return view('auth.complete-profile');
    }

    // Insert to DB
    public function store(UserProfileRequest $request){
        // Cara manual
        $newNameImg = 'prof-icon.svg';

        if($request->file('pfp')){
            $extension = $request->file('pfp')->getClientOriginalExtension();
            // $newNameImg = $request->firstName.'-'.now()->timestamp.'.'.$extension;
            $newNameImg = $request->firstName.'.'.$extension;
            $request->file('pfp')->storeAs('image/avatars', $newNameImg);
        }

        $user = Auth::user();
        $post = new UserProfile(); //membuat model baru.
        $post->user_id = $user->id;
        $post-> nama_depan = $request-> firstName;
        $post-> gambar = $newNameImg;
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

    public function update(Request $request)
    {
        $user = Auth::user();
        $userProfile = UserProfile::where('user_id', $user->id)->firstOrFail();


        if ($request->file('pfp')) {
            $extension = $request->file('pfp')->getClientOriginalExtension();
            $newNameImg = $request->firstName.'.'. $extension;
            $request->file('pfp')->storeAs('public/image/avatars', $newNameImg);
        }

        // Update atribut pada model UserProfile
        $userProfile->nama_depan = $request->firstName;
        $userProfile->nama_belakang = $request->lastName;
        $userProfile->no_telp = $request->noTelp;
        $userProfile->gender = $request->gender;
        $userProfile->dob = $request->dob;

        // Simpan perubahan
        $userProfile->save();

        return redirect('/');
    }



}
