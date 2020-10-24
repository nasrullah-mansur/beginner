<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded=[];

    public function post()
    {
        return $this->belongsToMany('App\Post');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
