<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $fillable=[
        'user_id','title','text','pro_id','view'
    ];
}
