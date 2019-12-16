<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=[
        'name'
    ];
    // Table Name
    protected $table = 'departments';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function staff(){        
        return $this->hasMany('App\Staff','dep_id');
    }
}
