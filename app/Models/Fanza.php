<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fanza extends Model
{
    use HasFactory;

    protected $table = "fanzas";
    protected $primaryKey = 'content_id';
    protected $keyType = 'string';
    protected $dates = ['date'];
    protected $casts = ['date' => 'date'];
    public $incrementing = false;

    protected $fillable = [
        'content_id',
        'title',
        'actress',
        'ruby',
        'maker',
        'label',
        'series',
        'director',
        'genre',
        'genre1',
        'genre2',
        'genre3',
        'genre4',
        'genre5',
        'genre6',
        'genre7',
        'genre8',
        'genre9',
        'affiliateURL',
        'date',
        'volume',
    ];
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function nices() {
        return $this->hasMany('App\Models\Nice');
    }
}
