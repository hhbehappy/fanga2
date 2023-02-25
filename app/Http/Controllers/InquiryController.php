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
        
        $inputs = Inquiry::create($request->validate([
            'name' => ['required', 'max:50', 'min:2'],
            'email' => ['required', 'max:50', 'email'],
            'message' => ['required', 'max:1000', 'min:5'],
        ]));

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
