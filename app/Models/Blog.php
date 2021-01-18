<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Zans;
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

    public function zan($user_id){
        return $this->hasOne(Zans::class, 'blog_id', 'id')->where('user_id' , $user_id);
    }
    
    public function zans(){
        return $this->hasMany(Zans::class, 'blog_id', 'id');
    }

}
