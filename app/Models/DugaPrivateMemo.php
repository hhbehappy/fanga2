<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DugaPrivateMemo extends Model
{
    use HasFactory;

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
}
