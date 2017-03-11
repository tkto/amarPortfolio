<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
        protected $table ='posts';
 protected $primaryKey = 'blog_id';

    public function tags(){
 	return $this->belongsToMany('App\Tag');
 }
}
