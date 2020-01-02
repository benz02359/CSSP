<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_category extends Model
{
    protected $fillable=[
        'post_id','category_id'        
    ];
    // Table Name
    protected $table = 'post_category';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function post(){        
        return $this->hasMany('App\Post','id','post_id');
    }
    /*public function post(){        
        return $this->belongsToMany('App\Post','post_id');
    }*/
}
