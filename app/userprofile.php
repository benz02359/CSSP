<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userprofile extends Model
{
    protected $fillable=[
        'name','email','tel','image','company_id','pro_id','user_id'
    ];
}
