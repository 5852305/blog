<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;
class Category extends Model
{
    protected $table='categorys';
    protected $fillable=['name','user_id'];
    public function articles(){
    return $this->hasMany(Article::class,'catid','id');
    }
}
