<?php

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

// Route::get('/', function () {
//     return view('backend.staff.show_staff');
// });
Route::get('/login', function () {
    return view('backend.login');
});
Route::get('/','HomeController@index')->name('home');
// Route::get('/show', function () {
//     return view('backend.staff.show_staff');
// });
Route::get('test','PointController@index');
// Route::get('add-staff','StaffController@add_staff')->name('add-new-staff');

Route::group(['prefix' => 'staff'], function() {
    Route::get('/','StaffController@index')->name('show-all-staff');
    Route::get('staff-detail/{id}','StaffController@staff_detail')->name('show-detail-staff');
    Route::delete('delete-detail-p-s/{id}','StaffController@delete_detail')->name('destroy-detils-points-staff');
    Route::get('bonus-staff/{id}','StaffController@bonus_points')->name('show-bonus-staff');
    Route::post('save-bonus/{id}','StaffController@save_bonus')->name('save-bonus');
    Route::get('add-staff','StaffController@create')->name('add-new-staff');
    Route::post('save-staff','StaffController@store_staff')->name('save-staff');
    Route::get('edit-staff/{id}','StaffController@edit_staff')->name('show-edit-staff');
    Route::post('update-staff/{id}','StaffController@update_staff')->name('update-staff');
    Route::delete('delete-staff/{id}','StaffController@destroy_staff')->name('destroy-staff');

    });
Route::group(['prefix' => 'poits'], function() {
    Route::get('show-poits','PointController@index')->name('show-poits');
    Route::get('add-poits','PointController@create')->name('show-add-poits');
    Route::post('save-poits','PointController@store')->name('save-poits');
    Route::get('edit-poits/{id}','PointController@edit')->name('show-edit-poits');
    Route::post('update-poits/{id}','PointController@update')->name('update-poits');
    Route::delete('delete-poits/{id}','PointController@destroy')->name('destroy-poits');
    });
Route::group(['prefix' => 'home'], function() {
     
     Route::get('staff-detail-home/{id}','HomeController@detail')->name('show-detail-home');
     Route::get('search/{id}/{month}','HomeController@search')->name('search');
    });