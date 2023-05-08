<?php

namespace App\Http\Controllers\Duga;

use App\Http\Controllers\Controller;
use App\Models\DugaNice;

class DugaNiceController extends Controller
{
    public function store($productid, $duga_id)
    {   
        DugaNice::nice($productid, $duga_id);
    }

    public function destroy($productid)
    {
        DugaNice::unNice($productid);
    }
}
