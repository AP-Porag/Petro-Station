<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('admin.index');
//});
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    //Vendor Route Start
    Route::resource('vendor', 'Admin\Vendor\VendorController');
    Route::get('vendor/delete/{id}', 'Admin\Vendor\VendorController@delete')->name('delete-vendor');

    //Vendor Route Start
    Route::resource('purchase', 'Admin\Purchase\PurchaseController');
    Route::get('purchase/delete/{id}', 'Admin\Purchase\PurchaseController@delete')->name('delete-purchase');

});
