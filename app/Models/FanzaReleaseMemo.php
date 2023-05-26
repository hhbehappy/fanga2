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
        'updated_at' => 'datetime:Y年m月d日 H:i:s',
    ];

    protected $fillable = [
        'user_id',
        'fanza_id',
        'name',
        'nickname',
        'content_id',
        'release',
        'f_position',
        'f_link',
        'f_no',
        'd_position',
        'd_link',
        'd_no'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fanza()
    {
        return $this->belongsTo(Fanza::class, 'content_id');
    }

    public static function myLists(){
        // 詳細ページのユーザーのメモした動画
        $mylists = FanzaReleaseMemo::with('fanza')->whereUser_id(Auth::id())->latest('updated_at')->get()->unique('content_id')->take(20);

        return $mylists;
    }

    public static function releaseLists(){
        // トップページのメモされた動画
        // 詳細ページの最近メモされた動画
        $releaselists = FanzaReleaseMemo::with('fanza')->latest('updated_at')->get()->unique('content_id')->take(20);

        return $releaselists;
    }

    public static function releaseAllLists(){
        // 最近メモされた動画の一覧ページ
        $releasealllists = FanzaReleaseMemo::with('fanza')->groupBy('content_id')->latest('updated_at')->paginate(100);

        return $releasealllists;
    }

    public static function fanzaReleaseMemos($content_id){
        // 詳細ページのメモリスト
        $fanza_release_memos = FanzaReleaseMemo::whereContent_id($content_id)->latest('updated_at')->take(10)->get();
        
        return $fanza_release_memos;
    }

    public static function fanzaReleaseMemoAllListChunk($content_id)
    {
        // メモの一覧のページネーション
        $release_memo_all_lists = FanzaReleaseMemo::with('fanza')->whereContent_id($content_id)->oldest('updated_at')->paginate(100);

        return $release_memo_all_lists;
    }

    public static function fanzaReleaseMemoAllListSort($sort, $content_id)
    {
        // メモの一覧ページ
        if($sort === 'oldest'){
            $releasememosort = FanzaReleaseMemo::with('fanza')->whereContent_id($content_id)->oldest('updated_at')->get();
        }
        if($sort === 'latest'){
            $releasememosort = FanzaReleaseMemo::with('fanza')->whereContent_id($content_id)->latest('updated_at')->get();
        }

        return $releasememosort;
    }
    public static function fanzaReleaseMemoAllListLatest($content_id)
    {
        // メモの最新50件のページ
            $releasememolatest = FanzaReleaseMemo::with('fanza')->whereContent_id($content_id)->latest('updated_at')->take(50)->get();

        return $releasememolatest;
    }

    public static function editReleaseMemos($memoid){
        $edit_release_memos = FanzaReleaseMemo::whereId($memoid)->get();
    
        return $edit_release_memos;
    }

    public static function memoList($column)
    {
        // 一覧ページのメモの多い順
        $memolists = DB::table('fanza_release_memos')
            ->select('fanza_release_memos.content_id', 'title', $column, DB::raw('count(*) as total'))
            ->groupBy('content_id', 'title', $column)->latest('total')
            ->leftJoin('fanzas', 'fanza_release_memos.content_id', '=', 'fanzas.content_id')
            ->get()->unique($column)->take(100);

        return $memolists;
    }

    public static function releaseMemoList()
    {
        // マイページ
        $release_memo_lists = FanzaReleaseMemo::with('fanza')->whereUser_id(Auth::id())->latest('updated_at')->get()->unique('content_id')->take(10);

        return $release_memo_lists;
    }

    public static function store($request, $fanza_id, $content_id)
    {
        $fanza = Fanza::find($content_id);
        $fanza->touch();

        if (FanzaReleaseMemo::whereId($request->get('f_no'))->exists()){
            $f_links = FanzaReleaseMemo::whereId($request->get('f_no'))->select('content_id')->get();
            foreach ($f_links as $f_link){
                $f_link = $f_link->content_id;
            }
        } else {
            $f_link = '';
        }

        if (DugaReleaseMemo::whereId($request->get('d_no'))->exists()){
            $d_links = DugaReleaseMemo::whereId($request->get('d_no'))->select('productid')->get();
            foreach($d_links as $d_link){
                $d_link = $d_link->productid;
            }
        } else {
            $d_link = '';
        }

        FanzaReleaseMemo::create([
            'user_id'      => Auth::id(),
            'name'         => Auth::user()->name,
            'nickname'     => $request->get('nickname'),
            'fanza_id'     => $fanza_id,
            'content_id'   => $content_id,
            'release'      => $request->get('release'),
            'f_position'   => $request->get('f_position'),
            'f_link'       => $f_link,
            'f_no'         => $request->get('f_no'),
            'd_position'   => $request->get('d_position'),
            'd_link'       => $d_link,
            'd_no'         => $request->get('d_no')
        ]);

        return back()
        ->with([
            'message' => 'メモを送信しました。',
            'status'  => 'release'
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
