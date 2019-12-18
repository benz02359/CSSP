<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_category extends Model
{
    protected $fillable=[
        
    ];
    // Table Name
    protected $table = 'Post_category';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    /*public function posts(){        
        return $this->belongsToMany('App\Post','post_id');
    }*/
    /*public function post(){        
        return $this->belongsToMany('App\Post','post_id');
    }*/
}
