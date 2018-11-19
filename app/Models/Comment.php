<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = ['id'];

    public function commentable()
    {
        return $this->morphTo();
    }


    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
