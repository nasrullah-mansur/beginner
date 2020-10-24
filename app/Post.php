<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //protected $fillable = ['title', 'description'];

    protected $guarded = [];

    protected $table = 'posts';
    

    //protected $with = ['user'];

    public function user()
    {
       // return $this->belongsTo('App\User', 'the_user_id', 'the_id');
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsToMany('App\Category');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Get the post's image.
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }


}
