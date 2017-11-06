<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['img', 'title', 'slug', 'content', 'tag_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
