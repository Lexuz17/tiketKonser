<?php

namespace App\Http\Controllers;

use App\Mail\TestSendingEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Controller
{
    public function index(){
        // ini kalau mau ambil dr DB
        // Mail::to($request->user())->send(new OrderShipped($order));

        Mail::to('tonycooper@gmail.com')->send(new TestSendingEmail());
    }
}
