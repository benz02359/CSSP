<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use Notifiable;

    protected $fillable=[
        'user_id','title','text','category_id','status','view','staff_id','pro_id'
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
        return $this->belongsTo('App\Staff','staff_id');
    }

    public function comments(){        
        return $this->hasMany('App\Comment');
    }

    public function category(){        
        return $this->belongsToMany('App\Category','Post_category');
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
    public function post_category(){        
        return $this->belongsTo('App\Post_category');
    }
}
