<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory,SerializeDate;

    protected $table = "threads";
    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日',
    ];

    protected $fillable = [
        'title'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function threadTitles()
    {
        $threads = Thread::select('id', 'title')->latest('updated_at')->take(3)->get();

        return $threads;
    }
}
