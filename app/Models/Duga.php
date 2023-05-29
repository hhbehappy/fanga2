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

    public static function index()
    {
        $videoids = Duga::latest('date')->paginate(100);

        return $videoids;
    }

    public static function store($request)
    {
        $performer_ruby = mb_convert_kana($request->get('performer_ruby'),'H','utf-8');
        
        Duga::updateOrCreate(
            ['productid'        => $request->get('productid')],
            ['productid'        => $request->get('productid'),
            'title'             => $request->get('title'),
            'caption'           => $request->get('caption'),
            'volume'            => $request->get('volume'),
            'maker'             => $request->get('maker'),
            'label'             => $request->get('label'),
            'series'            => $request->get('series'),
            'performer'         => $request->get('performer'),
            'ruby'              => $performer_ruby,
            'director'          => $request->get('director'),
            'category'          => $request->get('category'),
            'affiliateurl'      => $request->get('affiliateurl'),
            'jacketimage'       => $request->get('jacketimage'),
            'posterimage'       => $request->get('posterimage'),
            'thumbnail01'       => $request->get('thumbnail01'),
            'thumbnail02'       => $request->get('thumbnail02'),
            'thumbnail03'       => $request->get('thumbnail03'),
            'thumbnail04'       => $request->get('thumbnail04'),
            'thumbnail05'       => $request->get('thumbnail05'),
            'thumbnail06'       => $request->get('thumbnail06'),
            'thumbnail07'       => $request->get('thumbnail07'),
            'thumbnail08'       => $request->get('thumbnail08'),
            'thumbnail09'       => $request->get('thumbnail09'),
            'thumbnail10'       => $request->get('thumbnail10'),
            'date'              => $request->get('date')
        ]);
    }

    public static function destroy($id)
    {
        $fanzavideo = Duga::findOrFail($id);
        $fanzavideo->delete();
    }

    public static function videoIds($productid)
    {
        $productid_1 = Duga::findOrFail($productid);
        $videoids = Duga::find($productid_1);

        return $videoids;
    }

    public static function dVideoIds($hits){
        $dvideoids = Duga::whereDate('date', '<', Carbon::today())->latest('date')->take($hits)->get();
    
        return $dvideoids;
    }
    
    public static function dugaLists($column){
        $dugalists = Duga::whereDate('date', '<', Carbon::today())->whereNotIn($column, [''])->inRandomOrder()->get()->unique($column)->take(30);
    
        return $dugalists;
    }

    public static function videoLists($keyword){
        if (!empty($keyword)) {
            $videolists = Duga::where('maker', 'like', $keyword)
                ->orWhere('label', 'like', $keyword)
                ->orWhere('series', 'like', $keyword)
                ->orWhere('performer', 'like', $keyword)
                ->orWhere('director', 'like', $keyword)
                ->orWhere('category', 'like', $keyword)
                ->latest('date')
                ->paginate(100);
        }

        return $videolists;
    }

    public static function dugaKeyword($keyword){
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

    public static function itioshiLists($column)
    {
        $itioshilists = Duga::select('productid', 'jacketimage', 'posterimage', 'title', $column, 'updated_at')->whereNotIn($column, [''])->latest('updated_at')->get()->unique($column)->take(60);

        return $itioshilists;
    }

    public static function performerName($keyword)
    {
        if(!empty($keyword)){
            $performernamelists = Duga::select('productid', 'jacketimage', 'posterimage', 'title', 'performer', 'ruby', 'updated_at')->Where('ruby', 'like',$keyword. '%')
            ->oldest('ruby')
            ->get()->unique('performer');
        }

        return $performernamelists;
    }

    public static function columnAll($column)
    {
        $columnalllists = Duga::groupBy($column)->whereNotIn($column, [''])->oldest($column)->paginate(100);

        return $columnalllists;
    }

    public static function columnSearch($column, $keyword)
    {
        if(!empty($keyword)){
            $columnsearchlists = Duga::where($column, 'like', $keyword . '%')->groupBy($column)->oldest($column)->paginate(100);
        }

        return $columnsearchlists;
    }
}
