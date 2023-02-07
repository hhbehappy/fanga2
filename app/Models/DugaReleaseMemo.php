<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DugaReleaseMemo extends Model
{
    use HasFactory;

    protected $table = "duga_release_memos";
    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'nickname',
        'duga_id',
        'productid',
        're_productid',
        'release'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function duga()
    {
        return $this->belongsTo(Duga::class);
    }
}
