<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'blogs';

    protected $primaryKey = 'id';


    protected $fillable = [
        'title',
        'content',
        'creator_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }
}
