<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nice extends Model
{
    use HasFactory;

    protected $table = "nices";

    protected $fillable = [
        'user_id',
        'fanza_id',
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
}
