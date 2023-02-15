<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $inquiryids = Inquiry::select('id')->latest()->first();
        $inquirys = Inquiry::select('id', 'number', 'title', 'message', 'updated_at')->groupby('id', 'number', 'title', 'message', 'updated_at')->oldest('number')->get();
// dd($id);
        return Inertia::render('Inquiry', [
            'user_id' => $user_id,
            'inquiryids' => $inquiryids,
            'inquirys' => $inquirys
        ]);
    }

    public function store(Request $request){
        
        $request->validate([
            "title"     => "required|max:64|min:2",
            "message"   => "required|max:512|min:5",
        ]);

        Inquiry::create([
            'number' => $request->get('number'),
            'title' => $request->get('title'),
            'message' => $request->get('message')
            ]);

        return to_route('inquiry')->with([
            'message' => 'お問い合わせを送信しました。', 
            'status'=> 'store'
        ]);
    }

    public function destroy($id)
    {
        $standard_memo = Inquiry::findOrFail($id);
        $standard_memo->delete();

        return back()
        ->with([
            'message' => 'お問い合わせを削除しました。',
            'status'  => 'delete'
        ]);
    }
}
