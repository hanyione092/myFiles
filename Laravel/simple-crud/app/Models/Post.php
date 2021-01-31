<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'posted_by'
        //you need to define the columns in the model
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Likedby(User $user){
        return $this->likes->contains('user_id', $user->id);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
}
