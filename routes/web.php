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

Auth::routes();

Route::get('/', 'Colorspace\ProjectController@dashboard')->name('project.dashboard');

Route::get('/project', 'Colorspace\ProjectController@index')->name('project.index');
Route::post('/project-store', 'Colorspace\ProjectController@projectStore')->name('project.store');
Route::get('/project-hard-disk/{project?}', 'Colorspace\ProjectController@hddIndex')->name('hdd.index');
Route::post('/store-hard-disk/{project?}', 'Colorspace\ProjectController@hddStore')->name('hdd.store');

Route::get('/edit-hard-disk/{hdd?}', 'Colorspace\ProjectController@hddEdit')->name('hdd.edit');
Route::post('/update-hard-disk/{hdd?}', 'Colorspace\ProjectController@hddUpdate')->name('hdd.update');

Route::get('/remove-hard-disk/{hdd?}', 'Colorspace\ProjectController@hddRemove')->name('hdd.remove');
Route::post('/checkout-hard-disk/{hdd?}', 'Colorspace\ProjectController@checkOut')->name('hdd.checkout');

Route::get('/dit-hard-disk-details/{hdd?}', 'Colorspace\ProjectController@ditIndex')->name('dit.index');
Route::get('/dit-hard-disk-create/{hdd?}', 'Colorspace\ProjectController@ditCreate')->name('dit.create');
Route::post('/dit-hard-disk-store/{hdd?}', 'Colorspace\ProjectController@ditStore')->name('dit.store');

Route::get('/dit-hard-disk-edit/{dit?}', 'Colorspace\ProjectController@ditEdit')->name('dit.edit');
Route::post('/dit-hard-disk-update/{dit?}', 'Colorspace\ProjectController@ditUpdate')->name('dit.update');
Route::get('/dit-hard-disk-remove/{dit?}', 'Colorspace\ProjectController@ditRemove')->name('dit.remove');

Route::get('/users', 'Colorspace\ProjectController@users')->name('users');
Route::get('/user/remove', 'Colorspace\ProjectController@userRemove')->name('user.remove');
