<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\WebController;

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


Route::get('/','WebController@index');
//Route::get('/detail','WebController@detail')->name('detail');
Route::get('/detail/{id}',[WebController::class, 'detail'])->name('detail');
Route::get('/search',[WebController::class, 'search'])->name('search');

Auth::routes([
    'register' => false
]);

Route::get('/home', function (){
    return 'Nothing';
})->middleware(['redirect'])->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
   Route::get('dashboard',[\App\Http\Controllers\AdminController::class,'index'])->name('admin.index');
    Route::resource('adminuser',\App\Http\Controllers\AdminUserController::class);
    Route::resource('categories',\App\Http\Controllers\CategoreisController::class);
    Route::resource('books',\App\Http\Controllers\BooksController::class);

});

Route::group(['prefix'=>'user','middleware'=>['auth','user']],function (){
   Route::get('dashboard',[\App\Http\Controllers\UserController::class,'index','create'])->name('user.index');
   Route::resource('userbooks',\App\Http\Controllers\Userbooks::class);
});
Route::resource('/',\App\Http\Controllers\WebController::class);
