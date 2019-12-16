<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HQ extends Model
{
    protected $fillable=[
        'name','email','tel','address'
    ];
    // Table Name
    protected $table = 'hq';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
