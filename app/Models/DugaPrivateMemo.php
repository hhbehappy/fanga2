<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DugaPrivateMemo extends Model
{
    use HasFactory,SerializeDate;

    protected $table = "duga_private_memos";
    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日 H:i:s',
    ];

    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'name',
        'duga_id',
        'productid',
        're_productid',
        'private'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function duga()
    {
        return $this->belongsTo(Duga::class, 'productid');
    }

    public static function dugaPrivateMemos($productid){
        $duga_private_memos = DugaPrivateMemo::where([['productid', $productid], ['user_id', Auth::id()]])->oldest('updated_at')->get();

        return $duga_private_memos;
    }

    public static function editPrivateMemos($memoid){
        $edit_private_memos = DugaPrivateMemo::where([['id', $memoid], ['user_id', Auth::id()]])->get();
        
        return $edit_private_memos;
    }

    public static function privateMemoLists($group, $sort, $hits)
    {
        // マイページ
        if ($group) {
            if ($sort === 'oldest') {
                $private_memo_lists = DugaPrivateMemo::with('duga:productid,title,jacketimage')->whereUser_id(Auth::id())->whereProductid($group)->oldest('updated_at')->paginate($hits);
            }
            if ($sort === 'latest') {
                $private_memo_lists = DugaPrivateMemo::with('duga:productid,title,jacketimage')->whereUser_id(Auth::id())->whereProductid($group)->latest('updated_at')->paginate($hits);
            }
        } else {
            if ($sort === 'oldest') {
                $private_memo_lists = DugaPrivateMemo::with('duga:productid,title,jacketimage')->whereUser_id(Auth::id())->oldest('updated_at')->paginate($hits);
            }
            if ($sort === 'latest') {
                $private_memo_lists = DugaPrivateMemo::with('duga:productid,title,jacketimage')->whereUser_id(Auth::id())->latest('updated_at')->paginate($hits);
            }
        }

        return $private_memo_lists;
    }

    public static function privateMemoVideoLists($sort, $hits)
    {
        // マイページ
        if ($sort === 'oldest') {
            $private_memo_video_lists = DugaPrivateMemo::with(['duga.duga_nice' => function ($query) {
                $query->whereUser_id(Auth::id());
            }])->with('duga:productid,title,jacketimage')->select('duga_id', 'productid', 're_productid', DB::raw('MAX(updated_at) as updated_at'))->groupBy('productid')->whereUser_id(Auth::id())->oldest('updated_at')->paginate($hits);
        }

        if ($sort === 'latest') {
            $private_memo_video_lists = DugaPrivateMemo::with(['duga.duga_nice' => function ($query) {
                $query->whereUser_id(Auth::id());
            }])->with('duga:productid,title,jacketimage')->select('duga_id', 'productid', 're_productid', DB::raw('MAX(updated_at) as updated_at'))->groupBy('productid')->whereUser_id(Auth::id())->latest('updated_at')->paginate($hits);
        }

        return $private_memo_video_lists;
    }

    public static function store($request, $duga_id, $productid)
    {
        $re_productid = str_replace("-", "/", $productid);

        DugaPrivateMemo::create([
            'user_id'      => Auth::id(),
            'name'         => Auth::user()->name,
            'duga_id'      => $duga_id,
            'productid'    => $productid,
            're_productid' => $re_productid,
            'private'      => $request->get('private')
        ]);

        return back()
        ->with([
            'message' => '非公開メモを送信しました。',
            'status'  => 'private'
        ]);
    }

    public static function change($request, $id)
    {
        $privatememo = DugaPrivateMemo::findOrFail($id);

        $privatememo->update([
            'private'     => $request->get('private')
        ]);
    }

    public static function destroy($id)
    {
        $free_memo = DugaPrivateMemo::findOrFail($id);
        $free_memo->delete();

        return back()
        ->with([
            'message' => '非公開メモを削除しました。',
            'status'  => 'delete'
        ]);
    }
}
