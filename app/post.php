<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use Notifiable;

    protected $fillable=[
        'user_id','title','text','catafory_id','status','view','staff_id','pro_id'
    ];
    // Table Name
    protected $table = 'posts';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user(){        
        return $this->belongsTo('App\User');
    }

    public function staff(){        
        return $this->belongsTo('App\Staff');
    }

    public function comments(){        
        return $this->hasMany('App\Comment');
    }

    public function category(){        
        return $this->belongsToMany('App\Category');
    }

    public function tags(){        
        return $this->belongsToMany('App\Tag');
    }

    public function posttype(){        
        return $this->belongsTo('App\Posttype');
    }
    public function program(){        
        return $this->belongsTo('App\Program','pro_id');
    }
    /*public function postcate(){        
        return $this->belongsTo('App\Post_category','post_id');
    }*/
}
