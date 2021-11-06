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
    Route::get('/','App\Http\Controllers\PagesController@homepage')->name('appstart');
    // Route::get('/', function () {
    //     //return redirect(route('login'));
       
    // });
   
});


Route::middleware(['verified'])->group(function () {
    //Your routes here
    Route::group(['prefix' => 'admin'], function(){
        Route::group(['middleware' => 'admin'], function () {
            // Dashboard
            Route::get('/dashboard','App\Http\Controllers\PagesController@index')->name('homepage');
           
            // Floor Information
            Route::group(['prefix' => 'floor'], function(){

                Route::get('/manage', 'App\Http\Controllers\Backend\FloorController@index')->name('floor.manage');
        
                Route::get('/create', 'App\Http\Controllers\Backend\FloorController@create')->name('floor.create');
        
                Route::post('/store', 'App\Http\Controllers\Backend\FloorController@store')->name('floor.store');
        
                Route::get('/edit/{id}', 'App\Http\Controllers\Backend\FloorController@edit')->name('floor.edit');
        
                Route::post('/update/{id}', 'App\Http\Controllers\Backend\FloorController@update')->name('floor.update');
        
                Route::get('/delete/{id}', 'App\Http\Controllers\Backend\FloorController@destroy')->name('floor.destroy');
        
            });
            
            // Unit Information
            Route::group(['prefix' => 'unit'], function() {

                Route::get('/manage', 'App\Http\Controllers\Backend\UnitController@index')->name('unit.manage');
        
                Route::get('/create', 'App\Http\Controllers\Backend\UnitController@create')->name('unit.create');
        
                Route::post('/store', 'App\Http\Controllers\Backend\UnitController@store')->name('unit.store');
        
                Route::get('/edit/{id}', 'App\Http\Controllers\Backend\UnitController@edit')->name('unit.edit');
        
                Route::post('/update/{id}', 'App\Http\Controllers\Backend\UnitController@update')->name('unit.update');
        
                Route::get('/delete/{id}', 'App\Http\Controllers\Backend\UnitController@destroy')->name('unit.destroy');
            });

            // Owner Information
            Route::group(['prefix' => 'ownerlist'], function() {

                Route::get('/manage', 'App\Http\Controllers\Backend\OwnerlistController@index')->name('ownerlist.manage');
        
                Route::get('/create', 'App\Http\Controllers\Backend\OwnerlistController@create')->name('ownerlist.create');
        
                Route::post('/store', 'App\Http\Controllers\Backend\OwnerlistController@store')->name('ownerlist.store');

                Route::get('/getflatlist/{id}', 'App\Http\Controllers\Backend\OwnerlistController@getflatlist')->name('ownerlist.getflatlist');
        
                Route::get('/edit/{id}', 'App\Http\Controllers\Backend\OwnerlistController@edit')->name('ownerlist.edit');
        
                Route::post('/update/{id}', 'App\Http\Controllers\Backend\OwnerlistController@update')->name('ownerlist.update');
        
                Route::post('/delete/{id}', 'App\Http\Controllers\Backend\OwnerlistController@destroy')->name('ownerlist.destroy');
            });

            // Maintenance Cost
            Route::group(['prefix' => 'maintenance'], function() {

                Route::get('/manage', 'App\Http\Controllers\Backend\MaintenanceController@index')->name('maintenance.manage');
        
                Route::get('/create', 'App\Http\Controllers\Backend\MaintenanceController@create')->name('maintenance.create');
        
                Route::post('/store', 'App\Http\Controllers\Backend\MaintenanceController@store')->name('maintenance.store');
        
                Route::get('/edit/{id}', 'App\Http\Controllers\Backend\MaintenanceController@edit')->name('maintenance.edit');
        
                Route::post('/update/{id}', 'App\Http\Controllers\Backend\MaintenanceController@update')->name('maintenance.update');
        
                Route::post('/delete/{id}', 'App\Http\Controllers\Backend\MaintenanceController@destroy')->name('maintenance.destroy');
            });

        });
    });
});