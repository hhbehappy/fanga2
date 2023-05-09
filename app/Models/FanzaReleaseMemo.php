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

    public static function myLists(){
        $mylists = DB::table('fanza_release_memos')
        ->select('fanza_release_memos.content_id', 'title', 'fanza_release_memos.updated_at')->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')->where('user_id', Auth::id())->latest('updated_at')->get()->unique('content_id')->take(20);
        
        return $mylists;
    }

    public static function releaseLists(){
        $releaselists = DB::table('fanza_release_memos')
        ->select('fanza_release_memos.content_id', 'title', 'fanza_release_memos.updated_at')->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')->latest('updated_at')->get()->unique('content_id')->take(20);
    
        return $releaselists;
    }

    public static function releaseAllLists(){
        $releasealllists = DB::table('fanza_release_memos')
        ->select('fanza_release_memos.content_id', 'title', 'fanza_release_memos.updated_at')->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')->groupBy('content_id')->latest('updated_at')->paginate(100);

        return $releasealllists;
    }

    public static function fanzaReleaseMemos($content_id){
        $fanza_release_memos = FanzaReleaseMemo::whereContent_id($content_id)->oldest('updated_at')->get();
    
        return $fanza_release_memos;
    }

    public static function editReleaseMemos($memoid){
        $edit_release_memos = FanzaReleaseMemo::whereId($memoid)->get();
    
        return $edit_release_memos;
    }

    public static function memoList($column)
    {
        $memolists = DB::table('fanza_release_memos')
            ->select('fanza_release_memos.content_id', 'title', $column, DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', $column)->latest('total')
            ->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')
            ->get()->unique($column)->take(100);

        return $memolists;
    }

    public static function releaseMemoList()
    {
        $release_memo_lists = FanzaReleaseMemo::select('fanza_release_memos.content_id', 'title', 'fanzas.updated_at')->whereUser_id(Auth::id())->latest('updated_at')->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')->get()->unique('content_id');

        return $release_memo_lists;
    }

    public static function store($request, $fanza_id, $content_id)
    {
        $fanza = Fanza::find($content_id);
        $fanza->touch();

        FanzaReleaseMemo::create([
            'user_id'      => Auth::id(),
            'name'         => Auth::user()->name,
            'nickname'     => $request->get('nickname'),
            'fanza_id'     => $fanza_id,
            'content_id'   => $content_id,
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
        $releasememo = FanzaReleaseMemo::findOrFail($id);

        $releasememo->update([
            'nickname'    => $request->get('nickname'),
            'release'     => $request->get('release')
        ]);
    }

    public static function destroy($id)
    {
        
        $release_memo = FanzaReleaseMemo::findOrFail($id);
        $release_memo->delete();

        return back()
        ->with([
            'message' => 'メモを削除しました。',
            'status'  => 'delete'
        ]);
    }

}
