<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryForm;

class Inquiry extends Model
{
    use HasFactory;
    
    protected $table = "inquirys";

    protected $fillable = [
        'name',
        'email',
        'message'
    ];

    public static function store($request){
        
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
