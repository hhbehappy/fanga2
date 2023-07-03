<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FanzaPrivateMemo extends Model
{
    use HasFactory, SerializeDate;

    protected $table = "fanza_private_memos";
    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日 H:i:s',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'fanza_id',
        'content_id',
        'private'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fanza()
    {
        return $this->belongsTo(Fanza::class, 'content_id');
    }

    public static function fanzaPrivateMemos($content_id)
    {
        $fanza_private_memos = FanzaPrivateMemo::where([['content_id', $content_id], ['user_id', Auth::id()]])->oldest('updated_at')->get();

        return $fanza_private_memos;
    }

    public static function editPrivateMemos($memoid)
    {
        $edit_private_memos = FanzaPrivateMemo::where([['id', $memoid], ['user_id', Auth::id()]])->get();

        return $edit_private_memos;
    }

    public static function privateMemoLists($group, $sort, $hits)
    {
        // マイページ
        if ($group) {
            if ($sort === 'oldest') {
                $private_memo_lists = FanzaPrivateMemo::with('fanza:content_id,title')->whereUser_id(Auth::id())->whereContent_id($group)->oldest('updated_at')->paginate($hits);
            }
            if ($sort === 'latest') {
                $private_memo_lists = FanzaPrivateMemo::with('fanza:content_id,title')->whereUser_id(Auth::id())->whereContent_id($group)->latest('updated_at')->paginate($hits);
            }
        } else {
            if ($sort === 'oldest') {
                $private_memo_lists = FanzaPrivateMemo::with('fanza:content_id,title')->whereUser_id(Auth::id())->oldest('updated_at')->paginate($hits);
            }
            if ($sort === 'latest') {
                $private_memo_lists = FanzaPrivateMemo::with('fanza:content_id,title')->whereUser_id(Auth::id())->latest('updated_at')->paginate($hits);
            }
        }

        return $private_memo_lists;
    }

    public static function privateMemoVideoLists($sort, $hits)
    {
        // マイページ
        if ($sort === 'oldest') {
            $private_memo_video_lists = FanzaPrivateMemo::with(['fanza.fanza_nice' => function ($query) {
                $query->whereUser_id(Auth::id());
            }])->with('fanza:content_id,title')->select('fanza_id', 'content_id', DB::raw('MAX(updated_at) as updated_at'))->groupBy('content_id')->whereUser_id(Auth::id())->oldest('updated_at')->paginate($hits);
        }

        if ($sort === 'latest') {
            $private_memo_video_lists = FanzaPrivateMemo::with(['fanza.fanza_nice' => function ($query) {
                $query->whereUser_id(Auth::id());
            }])->with('fanza:content_id,title')->select('fanza_id', 'content_id', DB::raw('MAX(updated_at) as updated_at'))->groupBy('content_id')->whereUser_id(Auth::id())->latest('updated_at')->paginate($hits);
        }

        return $private_memo_video_lists;
    }

    public static function store($request, $fanza_id, $content_id)
    {
        FanzaPrivateMemo::create([
            'user_id'      => Auth::id(),
            'name'         => Auth::user()->name,
            'fanza_id'     => $fanza_id,
            'content_id'   => $content_id,
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
        $privatememo = FanzaPrivateMemo::findOrFail($id);

        $privatememo->update([
            'private'     => $request->get('private')
        ]);
    }

    public static function destroy($id)
    {
        $private_memo = FanzaPrivateMemo::findOrFail($id);
        $private_memo->delete();

        return back()
            ->with([
                'message' => '非公開メモを削除しました。',
                'status'  => 'delete'
            ]);
    }
}
