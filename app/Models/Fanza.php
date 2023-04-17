<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public static function fvideoids(){
        $fvideoids = Fanza::whereDate('date', '<', Carbon::today())->latest('date')->take(30)->get();
    
        return $fvideoids;
    }

    public static function fanzaactresss(){
        $fanzaactresss = Fanza::whereDate('date', '<', Carbon::today())->whereNotIn('actress', [''])->latest('updated_at')->get()->unique('actress')->take(30);
    
        return $fanzaactresss;
    }

    public static function fanzamakers(){
        $fanzamakers = Fanza::whereDate('date', '<', Carbon::today())->whereNotIn('maker', [''])->latest('updated_at')->get()->unique('maker')->take(30);
    
        return $fanzamakers;
    }

    public static function fanzaseriess(){
        $fanzaseriess = Fanza::whereDate('date', '<', Carbon::today())->whereNotIn('series', [''])->latest('updated_at')->get()->unique('series')->take(30);
    
        return $fanzaseriess;
    }

    public static function fanzakeyword($keyword){
        if(!empty($keyword)){
            $fanzas = Fanza::where('content_id', 'like', '%'. $keyword. '%')
            ->orWhere('title', 'like', '%'. $keyword. '%')
            ->orWhere('maker', 'like', '%'. $keyword. '%')
            ->orWhere('label', 'like', '%'. $keyword. '%')
            ->orWhere('series', 'like', '%'. $keyword. '%')
            ->orWhere('actress', 'like', '%'. $keyword. '%')
            ->orWhere('director', 'like', '%'. $keyword. '%')
            ->orWhere('genre', 'like', '%'. $keyword. '%')
            ->orWhere('genre1', 'like', '%'. $keyword. '%')
            ->orWhere('genre2', 'like', '%'. $keyword. '%')
            ->orWhere('genre3', 'like', '%'. $keyword. '%')
            ->orWhere('genre4', 'like', '%'. $keyword. '%')
            ->orWhere('genre5', 'like', '%'. $keyword. '%')
            ->orWhere('genre6', 'like', '%'. $keyword. '%')
            ->orWhere('genre7', 'like', '%'. $keyword. '%')
            ->orWhere('genre8', 'like', '%'. $keyword. '%')
            ->orWhere('genre9', 'like', '%'. $keyword. '%')
            ->latest('date')
            ->paginate(100);
        }
    
        return $fanzas;
    }
}
