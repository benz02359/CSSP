<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'id','name'
    ];
    // Table Name
    protected $table = 'categories';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function posts(){        
        return $this->hasMany('App\Post');
    }
    /*public function categories(){        
        return $this->hasMany('App\Post_category','category_id');
    }*/
}
