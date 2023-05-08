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

    public static function myLists(){
        $mylists = DB::table('duga_release_memos')
        ->select( 'duga_release_memos.productid', 're_productid', 'title', 'jacketimage', 'posterimage', 'duga_release_memos.updated_at')->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')->where('user_id', Auth::id())->latest('updated_at')->get()->unique('re_productid')->take(20);

        return $mylists;
    }

    public static function releaseLists(){
        $releaselists = DB::table('duga_release_memos')
        ->select('duga_release_memos.productid', 're_productid', 'title', 'jacketimage', 'posterimage', 'duga_release_memos.updated_at')->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')->latest('updated_at')->get()->unique('re_productid')->take(20);
    
        return $releaselists;
    }

    public static function releaseAllLists(){
        $releasealllists = DB::table('duga_release_memos')
        ->select('duga_release_memos.productid', 're_productid', 'title', 'jacketimage', 'posterimage', 'duga_release_memos.updated_at')->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')->groupBy('re_productid')->latest('updated_at')->paginate(100);

        return $releasealllists;
    }

    public static function dugaReleaseMemos($productid){
        $duga_release_memos = DugaReleaseMemo::whereProductid($productid)->oldest('updated_at')->get();
    
        return $duga_release_memos;
    }

    public static function editReleaseMemos($memoid){
        $edit_release_memos = DugaReleaseMemo::whereId($memoid)->get();
        
        return $edit_release_memos;
    }

    public static function memoList($column)
    {
        $memolists = DB::table('duga_release_memos')
        ->select('duga_release_memos.productid', 're_productid', 'title', 'jacketimage', $column, DB::raw('count(*) as total'))
        ->groupBy('productid', 're_productid', 'title', 'jacketimage', $column)->latest('total')
        ->leftJoin('dugas', 'duga_release_memos.productid', '=', 'dugas.productid')
        ->get()->unique($column)->take(100);

        return $memolists;
    }

    public static function store($request, $duga_id, $productid)
    {
        $duga = Duga::find($productid);
        $duga->touch();

        $re_productid = str_replace("-", "/", $productid);

        DugaReleaseMemo::create([
            'user_id'      => Auth::id(),
            'name'         => Auth::user()->name,
            'nickname'     => $request->get('nickname'),
            'duga_id'      => $duga_id,
            'productid'    => $productid,
            're_productid' => $re_productid,
            'release'      => $request->get('release')
        ]);

        return back()
        ->with([
            'message' => 'メモを送信しました。',
            'status'  => 'store'
        ]);
    }

    public static function change($request, $id)
    {
        $releasememo = DugaReleaseMemo::findOrFail($id);

        $releasememo->update([
            'nickname'    => $request->get('nickname'),
            'release'     => $request->get('release')
        ]);
    }

    public static function destroy($id)
    {
        $free_memo = DugaReleaseMemo::findOrFail($id);
        $free_memo->delete();

        return back()
        ->with([
            'message' => 'メモを削除しました。',
            'status'  => 'delete'
        ]);
    }
}
