<?php

namespace App\Http\Controllers\Fanza;

use App\Http\Controllers\Controller;
use App\Models\FanzaNice;

class FanzaNiceController extends Controller
{
    public function store($content_id, $fanza_id)
    {   
        FanzaNice::nice($content_id, $fanza_id);
    }

    public function destroy($content_id)
    {
        FanzaNice::unnice($content_id);
    }
}
