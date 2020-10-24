<?php

use App\User;
use App\Events\TestEvent;
use Nexmo\Laravel\Facade\Nexmo;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Route;
use App\Notifications\AuthNotification;
use Illuminate\Console\Scheduling\Event;
use App\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//get, post, pur or patch, delete

// Route::get('/test', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
// 	return view('welcome');
// });

// Route::get('/blog', "BlogController@index")->name('blog');

// Route::get('/post', "PostController@index");

// Route::post('/post', "PostController@store");


// Route::get('/post/{id}', "PostController@edit");

// Route::put('postupdate', "PostController@update");

// Route::get('/post/{id}/delete', "PostController@delete")->name('delete');

//article
// Route::Resource('/article', 'articleController')->except('index', 'update');
// Route::Resource('/article', 'articleController')->only('index', 'update');
Route::Resource('/article', 'articleController');

// Route::get('/admin/{locale?}', function ($locale=null) {
//     App::setLocale($locale);
//     return view('admin.index');
// });


Route::get('/notification', function(){
    // $user = User::findOrFail(1);
    // $user->notify(new AuthNotification());
    Notification::send(User::all(), new AuthNotification());
});

Route::get('/databasenoti', function(){
     $user = User::findOrFail(1);
     $user->notify(new DatabaseNotification());
});

Route::get('/noti', function(){
    $user = User::findOrFail(1);
    foreach($user->notifications as $noti){
        foreach($noti->data as $dnoti){
            return $dnoti;
        }
    }
});
Route::get('/unreadnoti', function(){
    $user = User::findOrFail(1);
    foreach($user->unreadNotifications as $noti){
        foreach($noti->data as $dnoti){
            return $dnoti;
        }
    }
});
Route::get('/readnoti', function(){
    $user = User::findOrFail(1);
    foreach($user->readNotifications as $noti){
        foreach($noti->data as $dnoti){
            return $dnoti;
        }
    }
});

Route::get('/markasread', function(){
    $user = User::findOrFail(1);
    foreach($user->unreadNotifications as $noti){
        $noti->markAsRead();
    }
});

Route::get('/deletenoti', function(){
    $user = User::findOrFail(1);
    $user->notifications()->delete();
});

Route::get('/sms', function(){
    Nexmo::message()->send([
        'to'   => '+8801728619733',
        'from' => '+8801728619733',
        'text' => 'Using the facade to send a message.'
    ]);

    User::findOrFail(1);
    
});

Route::get('/event', function(){
    $user = User::findOrFail(1);
     event(new TestEvent($user));
});


Route::get('/admin/user', 'UserController@index');
Route::post('/admin/user/update', 'UserController@update')->name('user.update');

Route::get('/test', function(){
    return auth()->user();
})->middleware('admin');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/post', 'PostController@index')->name('post.index');
    Route::get('/post/create', 'PostController@create')->name('post.create')->middleware('can:add-post');
    Route::post('/post/', 'PostController@store')->name('post.store');
    Route::put('/post/', 'PostController@edit')->name('post.edit');
    Route::get('/post/delete/{id}', 'PostController@destroy')->name('post.delete');

    Route::resource('/category', 'CategoryController');
    Route::resource('/tag', 'TagController');
});



Route::get('/logout', function(){
    Auth::logout();
    return redirect()->to('/login');
});

// Route::get('/article', 'articleController@index')->name('article.index');
// Route::post('/article', 'articleController@store')->name('article.index');
// Route::delete('/article/{id}', 'articleController@destroy')->name('article.destroy');

//route

//controller

//method

//model -  connect to database

//Auth::routes();


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
