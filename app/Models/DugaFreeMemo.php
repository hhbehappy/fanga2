<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DugaFreeMemo extends Model
{
    use HasFactory,SerializeDate;

    protected $table = "duga_free_memos";
    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日',
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
        return $this->belongsTo(Duga::class);
    }

    public static function duga_free_memos($productid){
        $duga_free_memos = DugaFreeMemo::whereProductid($productid)->oldest('updated_at')->get();
    
        return $duga_free_memos;
    }
}