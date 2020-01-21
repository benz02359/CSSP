<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable=[
        'name','detail','maintainstatus','solddate','startdate','enddate','company_id','price'
    ];

    // Table Name
    protected $table = 'programs';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function company(){        
        return $this->belongsTo('App\Company');
    }

    public function sale(){        
        return $this->belongsTo('App\Sale');
    }
    public function post(){        
        return $this->hasMany('App\Post','pro_id');
    }
}
