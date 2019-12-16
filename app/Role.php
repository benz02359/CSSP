<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=[
        'name'
    ];
    // Table Name
    protected $table = 'roles';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user(){        
        return $this->hasMany('App\User','role_id');
    }

}
