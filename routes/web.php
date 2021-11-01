<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frotend Route Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::group(['prefix' => '/'], function(){
    // Homepage
    Route::get('/', function () {
        return redirect(route('login'));
    });
   
});


Route::middleware(['verified'])->group(function () {
    //Your routes here
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'admin'], function(){
        Route::group(['middleware' => 'admin'], function () {

            Route::get('/dashboard','App\Http\Controllers\PagesController@index')->name('homepage');


        });
    });
});