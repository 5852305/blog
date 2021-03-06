<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

      protected $fillable = ['title', 'content','user_id','image','des','catid','statement'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function comments(){
      return $this->hasMany(Comment::class);
    }
    public function categorys(){
        return $this->belongsTo(Category::class, 'catid', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
