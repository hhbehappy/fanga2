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

    public static function duga_private_memos($productid){
        $duga_private_memos = DugaPrivateMemo::where([['productid', $productid], ['user_id', Auth::id()]])->oldest('updated_at')->get();
    
        return $duga_private_memos;
    }

    public static function privatememolimit($productid){
        $privatememolimit = DugaPrivateMemo::where([['productid', $productid], ['user_id', Auth::id()]])->count();
    
        return $privatememolimit;
    }

    public static function edit_private_memos($memoid){
        $edit_private_memos = DugaPrivateMemo::where([['id', $memoid], ['user_id', Auth::id()]])->get();
        
        return $edit_private_memos;
    }
}
