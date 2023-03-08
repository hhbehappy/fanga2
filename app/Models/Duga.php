<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duga extends Model
{
    use HasFactory;

    protected $table = "dugas";
    protected $primaryKey = 'productid';
    protected $keyType = 'string';
    protected $dates = ['date'];
    protected $casts = ['date' => 'date'];
    public $incrementing = false;

    protected $fillable = [
        'productid',
        'title',
        'caption',
        'volume',
        'maker',
        'label',
        'series',
        'performer',
        'ruby',
        'director',
        'category',
        'jacketimage',
        'posterimage',
        'thumbnail01',
        'thumbnail02',
        'thumbnail03',
        'thumbnail04',
        'thumbnail05',
        'thumbnail06',
        'thumbnail07',
        'thumbnail08',
        'thumbnail09',
        'thumbnail10',
        'affiliateurl',
        'date',
    ];
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function nices() {
        return $this->hasMany('App\Models\Nice');
    }
}
