<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable=[
        'company_id','pro_id','detail'
    ];
    // Table Name
    protected $table = 'sales';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function company(){        
        return $this->belongsTo('App\Company');
    }

    public function program(){        
        return $this->belongsTo('App\Program','pro_id');
    }
}
