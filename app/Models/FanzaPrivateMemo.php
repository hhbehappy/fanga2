<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FanzaPrivateMemo extends Model
{
    use HasFactory,SerializeDate;

    protected $table = "fanza_private_memos";
    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日',
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
        return $this->belongsTo(Fanza::class);
    }

    public static function fanza_private_memos($content_id){
        $fanza_private_memos = FanzaPrivateMemo::where([['content_id', $content_id], ['user_id', Auth::id()]])->oldest('updated_at')->get();
    
        return $fanza_private_memos;
    }

    public static function privatememolimit($content_id){
        $privatememolimit = FanzaPrivateMemo::where([['content_id', $content_id], ['user_id', Auth::id()]])->count();
    
        return $privatememolimit;
    }

    public static function edit_private_memos($memoid){
        $edit_private_memos = FanzaPrivateMemo::where([['id', $memoid], ['user_id', Auth::id()]])->get();
    
        return $edit_private_memos;
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
            'status'  => 'store'
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
