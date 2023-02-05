<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FanzaReleaseMemo extends Model
{
    use HasFactory;

    protected $table = "fanza_release_memos";
    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日',
    ];

    protected $fillable = [
        'user_id',
        'fanza_id',
        'name',
        'nickname',
        'content_id',
        'release'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fanza()
    {
        return $this->belongsTo(Fanza::class);
    }
}
