<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryForm;
use App\Models\Inquiry;

class InquiryController extends Controller
{

    public function index()
    {
        return Inertia::render('Inquiry/Index');
    }

    public function store(Request $request){

        $inputs = $request->validate([
            "title"     => "required|max:64|min:2",
            "email"     => "required",
            "message"   => "required|max:2000|min:5",
        ]);

        Inquiry::create([
            'title' => $request->get('title'),
            'email' => $request->get('email'),
            'message' => $request->get('message')
            ]);

        $admin=config('mail.admin');
        Mail::to($admin)->send(new InquiryForm($inputs));

        $email=$inputs['email'];
        Mail::to($email)->send(new InquiryForm($inputs));

        return back()
        ->with([
            'message' => 'お問い合わせを送信しました。',
            'status'  => 'store'
        ]);
    }
    
}
