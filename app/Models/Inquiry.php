<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    
    protected $table = "inquirys";

    protected $casts = [
        'updated_at' => 'datetime:Y年m月d日',
    ];
    protected $fillable = [
        'title',
        'email',
        'message'
    ];
}
