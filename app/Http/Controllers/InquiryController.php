<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Inquiry;

class InquiryController extends Controller
{

    public function index()
    {
        return Inertia::render('Inquiry/Index');
    }

    public function store(Request $request)
    {
        Inquiry::store($request);
    }
}
