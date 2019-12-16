<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posttype extends Model
{
    protected $fillable=[
        
    ];

    // Table Name
    protected $table = 'posttypes';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function posts(){        
        return $this->belongsTo('App\Post');
    }

}
