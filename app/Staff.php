<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable=[
        'name','email','tel','image','langauge','position','dep_id','pro_id','user_id'
    ];
}
