<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Staff extends Model
{
    protected $fillable=[
        'name','email','tel','image','language','position','dep_id','pro_id','user_id'
    ];
    // Table Name
    protected $table = 'staffs';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function dep(){        
        return $this->belongsTo('App\Department','dep_id');
    }

    public function posts(){        
        return $this->hasMany('App\Post','staff_id');
    }

    public function user(){        
        return $this->belongsTo('App\User');
    }
   
}
