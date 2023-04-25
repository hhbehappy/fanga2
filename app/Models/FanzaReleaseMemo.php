<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FanzaReleaseMemo extends Model
{
    use HasFactory,SerializeDate;
    
    protected $touches = ['fanza'];
    protected $table = "fanza_release_memos";
    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日',
    ];

    protected $fillable = [
        'user_id',
        'fanza_id',
        'name',
        'nickname',
        'content_id',
        'release'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fanza()
    {
        return $this->belongsTo(Fanza::class, "foreign_fanza_id");
    }

    public static function mylists(){
        $mylists = DB::table('fanza_release_memos')
        ->select('fanza_release_memos.content_id', 'title', 'fanza_release_memos.updated_at')->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')->where('user_id', Auth::id())->latest('updated_at')->get()->unique('content_id')->take(20);
        
        return $mylists;
    }

    public static function releaselists(){
        $releaselists = DB::table('fanza_release_memos')
        ->select('fanza_release_memos.content_id', 'title', 'fanza_release_memos.updated_at')->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')->latest('updated_at')->get()->unique('content_id')->take(20);
    
        return $releaselists;
    }

    public static function releasealllists(){
        $releasealllists = DB::table('fanza_release_memos')
        ->select('fanza_release_memos.content_id', 'title', 'fanza_release_memos.updated_at')->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')->groupBy('content_id')->latest('updated_at')->paginate(100);

        return $releasealllists;
    }

    public static function fanza_release_memos($content_id){
        $fanza_release_memos = FanzaReleaseMemo::whereContent_id($content_id)->oldest('updated_at')->get();
    
        return $fanza_release_memos;
    }

    public static function edit_release_memos($memoid){
        $edit_release_memos = FanzaReleaseMemo::whereId($memoid)->get();
    
        return $edit_release_memos;
    }

}
