<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FanzaNice extends Model
{
    use HasFactory;

    protected $table = "fanza_nices";

    protected $fillable = [
        'user_id',
        'fanza_id',
        'content_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fanza() {
        return $this->belongsTo('App\Models\Fanza');
    }

    public static function nice($content_id, $fanza_id){

        FanzaNice::create([
            'user_id' => Auth::id(),
            'fanza_id' => $fanza_id,
            'content_id' => $content_id,
        ]);

        return back()
        ->with([
            'nicemessage' => '気になる動画に登録しました。',
            'status'  => 'nice'
        ]);
    }

    public static function unNice($content_id){
        
        $nice=FanzaNice::where('content_id', $content_id)->first();
        $nice->delete();

        return back()
        ->with([
            'nicemessage' => '気になる動画から削除しました。',
            'status'  => 'unnice'
        ]);
    }

    public static function fanzaNice($content_id){
        $nice = FanzaNice::where([['content_id', $content_id], ['user_id', Auth::id()]])->first();

        return $nice;
    }

    public static function fanzaNiceCount($content_id){
        $nicecount = FanzaNice::whereContent_id($content_id)->count();
        
        return $nicecount;
    }

    public static function niceList($column)
    {
        $nicelists = DB::table('fanza_nices')
            ->select('fanza_nices.content_id', 'title', $column, DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', $column)->latest('total')
            ->leftJoin('fanzas', 'fanza_nices.content_id', '=', 'fanzas.content_id')
            ->get()->unique($column)->take(100);

        return $nicelists;
    }

    public static function profileNiceList()
    {
        $profile_nice_lists = FanzaNice::select('fanza_nices.content_id', 'title', 'fanzas.updated_at')->whereUser_id(Auth::id())->latest('updated_at')->leftJoin('fanzas', 'fanza_nices.content_id', '=', 'fanzas.content_id')->get()->unique('content_id');

        return $profile_nice_lists;
    }
    
}
