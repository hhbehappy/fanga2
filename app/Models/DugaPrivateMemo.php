<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DugaPrivateMemo extends Model
{
    use HasFactory,SerializeDate;

    protected $table = "duga_private_memos";
    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日',
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
        return $this->belongsTo(Duga::class);
    }

    public static function dugaPrivateMemos($productid){
        $duga_private_memos = DugaPrivateMemo::where([['productid', $productid], ['user_id', Auth::id()]])->oldest('updated_at')->get();
    
        return $duga_private_memos;
    }

    public static function privateMemoLimit($productid){
        $privatememolimit = DugaPrivateMemo::where([['productid', $productid], ['user_id', Auth::id()]])->count();
    
        return $privatememolimit;
    }

    public static function editPrivateMemos($memoid){
        $edit_private_memos = DugaPrivateMemo::where([['id', $memoid], ['user_id', Auth::id()]])->get();
        
        return $edit_private_memos;
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
            'status'  => 'store'
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
