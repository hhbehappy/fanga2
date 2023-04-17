<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Nice extends Model
{
    use HasFactory;

    protected $table = "nices";

    protected $fillable = [
        'user_id',
        'fanza_id',
        'duga_id',
        'type',
        'content_id',
        're_productid'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fanza() {
        return $this->belongsTo('App\Models\Fanza');
    }

    public function duga() {
        return $this->belongsTo('App\Models\Duga');
    }

    public static function nice($content_id){
        $nice = Nice::where([['content_id', $content_id], ['user_id', Auth::id()]])->first();

        return $nice;
    }

    public static function nicecount($content_id){
        $nicecount = Nice::whereContent_id($content_id)->count();
        
        return $nicecount;
    }

}
