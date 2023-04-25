<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DugaReleaseMemo extends Model
{
    use HasFactory,SerializeDate;

    protected $touches = ['duga'];
    protected $table = "duga_release_memos";
    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'nickname',
        'duga_id',
        'productid',
        're_productid',
        'release'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function duga()
    {
        return $this->belongsTo(Duga::class, "foreign_duga_id");
    }

    public static function mylists(){
        $mylists = DB::table('duga_release_memos')
        ->select( 'duga_release_memos.productid', 're_productid', 'title', 'jacketimage', 'posterimage', 'duga_release_memos.updated_at')->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')->where('user_id', Auth::id())->latest('updated_at')->get()->unique('re_productid')->take(20);

        return $mylists;
    }

    public static function releaselists(){
        $releaselists = DB::table('duga_release_memos')
        ->select('duga_release_memos.productid', 're_productid', 'title', 'jacketimage', 'posterimage', 'duga_release_memos.updated_at')->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')->latest('updated_at')->get()->unique('re_productid')->take(20);
    
        return $releaselists;
    }

    public static function releasealllists(){
        $releasealllists = DB::table('duga_release_memos')
        ->select('duga_release_memos.productid', 're_productid', 'title', 'jacketimage', 'posterimage', 'duga_release_memos.updated_at')->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')->groupBy('re_productid')->latest('updated_at')->paginate(100);

        return $releasealllists;
    }

    public static function duga_release_memos($productid){
        $duga_release_memos = DugaReleaseMemo::whereProductid($productid)->oldest('updated_at')->get();
    
        return $duga_release_memos;
    }

    public static function edit_release_memos($memoid){
        $edit_release_memos = DugaReleaseMemo::whereId($memoid)->get();
        
        return $edit_release_memos;
    }
}
