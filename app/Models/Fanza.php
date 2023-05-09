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

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function nices()
    {
        return $this->hasMany('App\Models\Nice');
    }

    public static function index()
    {
        $videoids = Fanza::latest('date')->paginate(100);

        return $videoids;
    }

    public static function store($request)
    {
        Fanza::updateOrCreate(
            ['content_id'        => $request->get('content_id')],
            ['content_id'        => $request->get('content_id'),
            'title'              => $request->get('title'),
            'affiliateURL'       => $request->get('affiliateURL'),
            'volume'             => $request->get('volume'),
            'maker'              => $request->get('maker'),
            'label'              => $request->get('label'),
            'series'             => $request->get('series'),
            'actress'            => $request->get('actress'),
            'ruby'               => $request->get('ruby'),
            'director'           => $request->get('director'),
            'genre'              => $request->get('genre'),
            'genre1'             => $request->get('genre1'),
            'genre2'             => $request->get('genre2'),
            'genre3'             => $request->get('genre3'),
            'genre4'             => $request->get('genre4'),
            'genre5'             => $request->get('genre5'),
            'genre6'             => $request->get('genre6'),
            'genre7'             => $request->get('genre7'),
            'genre8'             => $request->get('genre8'),
            'genre9'             => $request->get('genre9'),
            'date'               => $request->get('date'),
        ]);
    }

    public static function destroy($id)
    {
        $fanzavideo = Fanza::findOrFail($id);
        $fanzavideo->delete();
    }

    public static function fVideoIds($hits)
    {
        $fvideoids = Fanza::whereDate('date', '<', Carbon::today())->latest('date')->take($hits)->get();

        return $fvideoids;
    }

    public static function fanzaLists($column)
    {
        $fanzalists = Fanza::whereDate('date', '<', Carbon::today())->whereNotIn($column, [''])->inRandomOrder()->get()->unique($column)->take(30);

        return $fanzalists;
    }

    public static function videoLists($keyword)
    {
        if (!empty($keyword)) {
            $videolists = Fanza::where('maker', 'like', $keyword)
                ->orWhere('label', 'like', $keyword)
                ->orWhere('series', 'like', $keyword)
                ->orWhere('actress', 'like', $keyword)
                ->orWhere('director', 'like', $keyword)
                ->orWhere('genre', 'like', $keyword)
                ->orWhere('genre1', 'like', $keyword)
                ->orWhere('genre2', 'like', $keyword)
                ->orWhere('genre3', 'like', $keyword)
                ->orWhere('genre4', 'like', $keyword)
                ->orWhere('genre5', 'like', $keyword)
                ->orWhere('genre6', 'like', $keyword)
                ->orWhere('genre7', 'like', $keyword)
                ->orWhere('genre8', 'like', $keyword)
                ->orWhere('genre9', 'like', $keyword)
                ->latest('date')
                ->paginate(100);

            return $videolists;
        }
    }

    public static function fanzaKeyword($keyword)
    {
        if (!empty($keyword)) {
            $fanzas = Fanza::where('content_id', 'like', '%' . $keyword . '%')
                ->orWhere('title', 'like', '%' . $keyword . '%')
                ->orWhere('maker', 'like', '%' . $keyword . '%')
                ->orWhere('label', 'like', '%' . $keyword . '%')
                ->orWhere('series', 'like', '%' . $keyword . '%')
                ->orWhere('actress', 'like', '%' . $keyword . '%')
                ->orWhere('director', 'like', '%' . $keyword . '%')
                ->orWhere('genre', 'like', '%' . $keyword . '%')
                ->orWhere('genre1', 'like', '%' . $keyword . '%')
                ->orWhere('genre2', 'like', '%' . $keyword . '%')
                ->orWhere('genre3', 'like', '%' . $keyword . '%')
                ->orWhere('genre4', 'like', '%' . $keyword . '%')
                ->orWhere('genre5', 'like', '%' . $keyword . '%')
                ->orWhere('genre6', 'like', '%' . $keyword . '%')
                ->orWhere('genre7', 'like', '%' . $keyword . '%')
                ->orWhere('genre8', 'like', '%' . $keyword . '%')
                ->orWhere('genre9', 'like', '%' . $keyword . '%')
                ->latest('date')
                ->paginate(100);
        }

        return $fanzas;
    }

    public static function itioshiLists($column)
    {
        $itioshilists = Fanza::select('content_id', 'title', $column, 'updated_at')->whereNotIn($column, [''])->latest('updated_at')->get()->unique($column)->take(60);

        return $itioshilists;
    }

    public static function actressName($keyword)
    {
        if (!empty($keyword)) {
            $actressnamelists = Fanza::select('content_id', 'title', 'actress', 'ruby', 'updated_at')->Where('ruby', 'like', $keyword . '%')->oldest('ruby')->get()->unique('actress');
        }

        return $actressnamelists;
    }

    public static function columnAll($column)
    {
        $columnalllists = Fanza::groupBy($column)->whereNotIn($column, [''])->oldest($column)->paginate(100);

        return $columnalllists;
    }

    public static function columnSearch($column, $keyword)
    {
        if(!empty($keyword)){
            $columnsearchlists = Fanza::where($column, 'like', $keyword . '%')->groupBy($column)->oldest($column)->paginate(100);
        }

        return $columnsearchlists;
    }
}
