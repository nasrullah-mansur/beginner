<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=[];

    public function post()
    {
        return $this->belongsToMany('App\Post');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }
    // public function getFullAttribute()
    // {
    //     return "{$this->name} {$this->created_at}";
    // }

    public function getRouteKeyName()
    {
        return 'name';
    }

}
