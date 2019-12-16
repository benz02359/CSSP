<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Userprofile extends Model
{
    protected $fillable=[
        'tel','image','user_id'
    ];
    public function user(){        
        return $this->hasOne('App\User');
    }
}
