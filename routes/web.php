<?php

use LDAP\Result;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\offerController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'ajaxoffers'],function(){
    Route::get('create',[offerController::class,'create']);
    Route::post('store',[offerController::class,'store']);
    Route::get('all', 'offerController@all')->name('ajax.offers.all');

});

