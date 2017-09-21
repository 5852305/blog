<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;
class Tag extends Model
{


protected $fillable = ['name','user_id'];

public function articles()
{
    return $this->belongsToMany(Article::class);
}

}
