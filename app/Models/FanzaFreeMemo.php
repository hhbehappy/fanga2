<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FanzaFreeMemo extends Model
{
    use HasFactory,SerializeDate;

    protected $table = "fanza_free_memos";
    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日',
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
        return $this->belongsTo(Fanza::class);
    }

    public static function fanzaFreeMemos($content_id){
        $fanza_free_memos = FanzaFreeMemo::whereContent_id($content_id)->oldest('updated_at')->get();
    
        return $fanza_free_memos;
    }

    public static function freeMemoList(){
        $free_memo_lists = FanzaFreeMemo::select('fanza_free_memos.content_id', 'title', 'fanzas.updated_at')->whereUser_id(Auth::id())->latest('updated_at')->leftJoin('fanzas', 'fanza_free_memos.content_id', '=', 'fanzas.content_id')->get()->unique('content_id');
    
        return $free_memo_lists;
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
            'status'  => 'store'
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
