<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable=[
        'name','email','tel','address'
    ];
    // Table Name
    protected $table = 'companies';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function sale(){        
        return $this->belongsTo('App\Sale');
    }
    public function user(){        
        return $this->hasMany('App\User','company_id');
    }
    public function program(){        
        return $this->hasMany('App\Program','company_id');
    }

}
