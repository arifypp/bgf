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

                // Invoice Generating
                Route::get('/invoice/{id}', 'App\Http\Controllers\Backend\MaintenanceController@invoice')->name('maintenance.invoice');
        
                Route::post('/update/{id}', 'App\Http\Controllers\Backend\MaintenanceController@update')->name('maintenance.update');
        
                Route::post('/delete/{id}', 'App\Http\Controllers\Backend\MaintenanceController@destroy')->name('maintenance.destroy');
            });


            // Deposit Cost
            Route::group(['prefix' => 'deposit'], function() {

                Route::get('/manage', 'App\Http\Controllers\Backend\DepositorController@index')->name('deposit.manage');
        
                Route::get('/create', 'App\Http\Controllers\Backend\DepositorController@create')->name('deposit.create');
        
                Route::post('/store', 'App\Http\Controllers\Backend\DepositorController@store')->name('deposit.store');
        
                Route::get('/edit/{id}', 'App\Http\Controllers\Backend\DepositorController@edit')->name('deposit.edit');

                // Invoice Generating
                Route::get('/invoice/{id}', 'App\Http\Controllers\Backend\DepositorController@invoice')->name('deposit.invoice');

                // Confirm Page
                Route::get('/confirmed', 'App\Http\Controllers\Backend\DepositorController@confirm')->name('deposit.confirmed');
        
                Route::post('/update/{id}', 'App\Http\Controllers\Backend\DepositorController@update')->name('deposit.update');
        
                Route::post('/delete/{id}', 'App\Http\Controllers\Backend\DepositorController@destroy')->name('deposit.destroy');
            });

            // Notification System
            Route::group(['prefix' => 'notification'], function() {

                Route::get('/manage', 'App\Http\Controllers\Backend\NotificationController@index')->name('notification.manage');

                // Show notification
                Route::get('/notify', 'App\Http\Controllers\Backend\NotificationController@notify')->name('notification.notify');
                // Showe Single Notification
                Route::get('/notify/{id}', 'App\Http\Controllers\Backend\NotificationController@notifySingle')->name('singlenotify');
                // Notification seen and unseen
                Route::post('/seenanduseen', 'App\Http\Controllers\Backend\NotificationController@seenunseen')->name('notification.seenunseen');
        
                Route::get('/create', 'App\Http\Controllers\Backend\NotificationController@create')->name('notification.create');
        
                Route::post('/store', 'App\Http\Controllers\Backend\NotificationController@store')->name('notification.store');
        
                Route::get('/edit/{id}', 'App\Http\Controllers\Backend\NotificationController@edit')->name('notification.edit');
        
                Route::post('/update/{id}', 'App\Http\Controllers\Backend\NotificationController@update')->name('notification.update');
        
                Route::post('/delete/{id}', 'App\Http\Controllers\Backend\NotificationController@destroy')->name('notification.destroy');
            });

        });
    });
});