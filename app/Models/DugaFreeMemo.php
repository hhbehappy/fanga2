<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DugaFreeMemo extends Model
{
    use HasFactory,SerializeDate;

    protected $table = "duga_free_memos";
    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日 H:i:s',
    ];

    protected $fillable = [
        'user_id',
        'duga_id',
        'productid',
        're_productid',
        'free'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function duga()
    {
        return $this->belongsTo(Duga::class, 'productid');
    }

    public static function dugaFreeMemos($productid){
        $duga_free_memos = DugaFreeMemo::whereProductid($productid)->oldest('updated_at')->get();
    
        return $duga_free_memos;
    }

    public static function freeMemoLists($group, $sort, $hits)
    {
        // マイページ
        if ($group) {
            if ($sort === 'oldest') {
                $free_memo_lists = DugaFreeMemo::with('duga:productid,title,jacketimage')->whereUser_id(Auth::id())->whereProductid($group)->oldest('updated_at')->paginate($hits);
            }
            if ($sort === 'latest') {
                $free_memo_lists = DugaFreeMemo::with('duga:productid,title,jacketimage')->whereUser_id(Auth::id())->whereProductid($group)->latest('updated_at')->paginate($hits);
            }
        } else {
            if ($sort === 'oldest') {
                $free_memo_lists = DugaFreeMemo::with('duga:productid,title,jacketimage')->whereUser_id(Auth::id())->oldest('updated_at')->paginate($hits);
            }
            if ($sort === 'latest') {
                $free_memo_lists = DugaFreeMemo::with('duga:productid,title,jacketimage')->whereUser_id(Auth::id())->latest('updated_at')->paginate($hits);
            }
        }

        return $free_memo_lists;
    }

    public static function freeMemoVideoLists($sort, $hits)
    {
        // マイページ
        if ($sort === 'oldest') {
            $free_memo_video_lists = DugaFreeMemo::with(['duga.duga_nice' => function ($query) {
                $query->whereUser_id(Auth::id());
            }])->with('duga:productid,title,jacketimage')->select('duga_id', 'productid', 're_productid', DB::raw('MAX(updated_at) as updated_at'))->groupBy('productid')->whereUser_id(Auth::id())->oldest('updated_at')->paginate($hits);
        }

        if ($sort === 'latest') {
            $free_memo_video_lists = DugaFreeMemo::with(['duga.duga_nice' => function ($query) {
                $query->whereUser_id(Auth::id());
            }])->with('duga:productid,title,jacketimage')->select('duga_id', 'productid', 're_productid', DB::raw('MAX(updated_at) as updated_at'))->groupBy('productid')->whereUser_id(Auth::id())->latest('updated_at')->paginate($hits);
        }

        return $free_memo_video_lists;
    }

    public static function store($request, $duga_id, $productid)
    {
        $re_productid = str_replace("-", "/", $productid);

        DugaFreeMemo::create([
            'user_id'      => Auth::id(),
            'duga_id'      => $duga_id,
            'productid'    => $productid,
            're_productid' => $re_productid,
            'free'         => $request->get('free')
        ]);

        return back()
        ->with([
            'message' => 'フリーメモを送信しました。',
            'status'  => 'free'
        ]);
    }

    public static function destroy($id)
    {
        $free_memo = DugaFreeMemo::findOrFail($id);
        $free_memo->delete();

        return back()
        ->with([
            'message' => 'フリーメモを削除しました。',
            'status'  => 'delete'
        ]);
    }
    
}