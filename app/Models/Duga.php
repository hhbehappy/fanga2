<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public static function dvideoids(){
        $dvideoids = Duga::whereDate('date', '<', Carbon::today())->latest('date')->take(30)->get();
    
        return $dvideoids;
    }

    public static function dugaperformers(){
        $dugaperformers = Duga::whereDate('date', '<', Carbon::today())->whereNotIn('performer', [''])->latest('updated_at')->get()->unique('performer')->take(30);
    
        return $dugaperformers;
    }

    public static function dugamakers(){
        $dugamakers = Duga::whereDate('date', '<', Carbon::today())->whereNotIn('maker', [''])->latest('updated_at')->get()->unique('maker')->take(30);
    
        return $dugamakers;
    }

    public static function dugaseriess(){
        $dugaseriess = Duga::whereDate('date', '<', Carbon::today())->whereNotIn('series', [''])->latest('updated_at')->get()->unique('series')->take(30);
    
        return $dugaseriess;
    }

    public static function dugakeyword($keyword){
        if(!empty($keyword)){
            $dugas = Duga::where('productid', 'like','%'. $keyword. '%')
            ->orWhere('title', 'like','%'. $keyword. '%')
            ->orWhere('maker', 'like','%'. $keyword. '%')
            ->orWhere('label', 'like','%'. $keyword. '%')
            ->orWhere('series', 'like','%'. $keyword. '%')
            ->orWhere('performer', 'like','%'. $keyword. '%')
            ->orWhere('ruby', 'like','%'. $keyword. '%')
            ->orWhere('director', 'like','%'. $keyword. '%')
            ->orWhere('category', 'like','%'. $keyword. '%')
            ->latest('date')
            ->paginate(100);
        }
    
        return $dugas;
    }
}
