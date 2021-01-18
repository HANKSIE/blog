<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zans extends Model
{
    use HasFactory;
    
    protected $table = 'zans';

    protected $fillable = [
        'blog_id',
        'user_id',
    ];


}
