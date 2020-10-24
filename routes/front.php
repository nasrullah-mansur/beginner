<?php

use Illuminate\Support\Facades\Route;

Route::get('/front', 'front\frontController@index');

Route::get('/image', function(){
    return view('front.image');
});

Route::post('/image', 'front\frontController@image')->name('image');