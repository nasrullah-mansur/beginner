<?php

namespace App;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function routeNotificationForNexmo($notification)
    {
        return $this->phone;
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }

      /**
     * Get the post's image.
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }


    Static function imagecrop($path, $start=200, $end=100)
    {
      // Resize and encode to required type
      //$img = Image::make($path)->fit(300)->encode('jpg');
      $img = Image::make($path)->resize($start, $end, function($constraint){
        $constraint->aspectRatio();
      })->encode('jpg');
      //Provide own name
      $name = time() . '.jpg';
      //Put file with own name
      Storage::put($name, $img);
      //Move file to your location
      Storage::move($name, 'public/image/'.'_'. $name);
    }
}
