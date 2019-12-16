<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=[
        
    ];
    // Table Name
    protected $table = 'tags';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function posts(){        
        return $this->belongsToMany('App\Post');
    }
}
