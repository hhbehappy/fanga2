<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FanzaFreeMemo extends Model
{
    use HasFactory,SerializeDate;

    protected $table = "fanza_free_memos";
    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日 H:i:s',
    ];

    protected $fillable = [
        'user_id',
        'fanza_id',
        'content_id',
        'free'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function fanza()
    {
        return $this->belongsTo(Fanza::class, 'content_id');
    }

    public static function fanzaFreeMemos($content_id){
        $fanza_free_memos = FanzaFreeMemo::whereContent_id($content_id)->oldest('updated_at')->get();
    
        return $fanza_free_memos;
    }

    public static function freeMemoLists($group, $sort, $hits)
    {
        // マイページ
        if ($group) {
            if ($sort === 'oldest') {
                $free_memo_lists = FanzaFreeMemo::with('fanza:content_id,title')->whereUser_id(Auth::id())->whereContent_id($group)->oldest('updated_at')->paginate($hits);
            }
            if ($sort === 'latest') {
                $free_memo_lists = FanzaFreeMemo::with('fanza:content_id,title')->whereUser_id(Auth::id())->whereContent_id($group)->latest('updated_at')->paginate($hits);
            }
        } else {
            if ($sort === 'oldest') {
                $free_memo_lists = FanzaFreeMemo::with('fanza:content_id,title')->whereUser_id(Auth::id())->oldest('updated_at')->paginate($hits);
            }
            if ($sort === 'latest') {
                $free_memo_lists = FanzaFreeMemo::with('fanza:content_id,title')->whereUser_id(Auth::id())->latest('updated_at')->paginate($hits);
            }
        }

        return $free_memo_lists;
    }

    public static function freeMemoVideoLists($sort, $hits)
    {
        // マイページ
        if ($sort === 'oldest') {
            $free_memo_video_lists = FanzaFreeMemo::with(['fanza.fanza_nice' => function ($query) {
                $query->whereUser_id(Auth::id());
            }])->with('fanza:content_id,title')->select('fanza_id', 'content_id', DB::raw('MAX(updated_at) as updated_at'))->groupBy('content_id')->whereUser_id(Auth::id())->oldest('updated_at')->paginate($hits);
        }

        if ($sort === 'latest') {
            $free_memo_video_lists = FanzaFreeMemo::with(['fanza.fanza_nice' => function ($query) {
                $query->whereUser_id(Auth::id());
            }])->with('fanza:content_id,title')->select('fanza_id', 'content_id', DB::raw('MAX(updated_at) as updated_at'))->groupBy('content_id')->whereUser_id(Auth::id())->latest('updated_at')->paginate($hits);
        }

        return $free_memo_video_lists;
    }

    public static function store($request, $fanza_id, $content_id)
    {
        FanzaFreeMemo::create([
            'user_id'      => Auth::id(),
            'fanza_id'     => $fanza_id,
            'content_id'   => $content_id,
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
        
        $free_memo = FanzaFreeMemo::findOrFail($id);
        $free_memo->delete();

        return back()
        ->with([
            'message' => 'フリーメモを削除しました。',
            'status'  => 'delete'
        ]);
    }
}
