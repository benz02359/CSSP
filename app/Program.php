<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable=[
        'name','detail','maintainstatus','solddate','startdate','enddate','company_id'
    ];
}
