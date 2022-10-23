<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\AdexController;
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

Route::get('/credit', [CreditController::class, 'credit'])->name('credit');
Route::get('/','Auth\AdminAuthController@getLogin')->name('adminLogin');
Route::get('admin/login','Auth\AdminAuthController@getLogin')->name('adminLogin');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin')->name('adminLoginPost');
Route::get('admin/logout', 'Auth\AdminAuthController@logout')->name('adminLogout');

Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
	// Admin Dashboard
	Route::get('dashboard','AdexController@dashboard')->name('dashboard');	
Route::get('power','AdexController@power')->name('power');	

Route::get('level_1','AdexController@level_1')->name('level_1');	

Route::get('level_2','AdexController@level_2')->name('level_2');	
Route::get('level_3','AdexController@level_3')->name('level_3');	
Route::get('level_4','AdexController@level_4')->name('level_4');	
Route::get('level_5','AdexController@level_5')->name('level_5');	
	
Route::post('customer_1','AdexController@customer_1')->name('customer_1');
Route::post('/customerupdate','AdexController@customerupdate')->name('customerupdate');
Route::post('/resetupdate','AdexController@resetupdate')->name('resetupdate');
Route::post('/shopupdate','AdexController@shopupdate')->name('shopupdate');
Route::get('reset','AdexController@reset')->name('reset');
Route::get('mother','ResetController@mother')->name('mother');
Route::get('input','AdexController@input')->name('input');
Route::get('input_invalid','AdexController@input_invalid')->name('input_invalid');
Route::post('/bill_create','AdexController@bill_create')->name('bill_create');
Route::get('input_1','ResetController@input_1')->name('input_1');
Route::post('/bill_create_1','Reset1Controller@bill_create_1')->name('bill_create_1');
Route::post('/service_charge','Reset1Controller@service_charge')->name('service_charge');
Route::get('service','Reset1Controller@service')->name('service');
Route::get('bill','AdexController@bill')->name('bill');
Route::get('shop_detail','AdexController@shop_detail')->name('shop_detail');
Route::get('shop/{id}','AdexController@shop_edit')->name('shop_edit');
});
