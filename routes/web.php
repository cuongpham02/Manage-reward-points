<?php
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\PointController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
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
Route::namespace('Admin')->group(function () {
    Route::get('/login','AuthController@showFormLogin')->name('admin.showlogin');
    Route::post('/checklogin','AuthController@Login')->name('admin.checklogin');
    Route::middleware('auth')->group(function(){
        Route::get('/dashboard','AuthController@showDashboard')->name('admin.dashboard');
        Route::get('/logout','AuthController@Logout')->name('admin.logout');
        Route::group(['prefix' => 'staff'], function() {
        Route::get('/','StaffController@index')->name('show-all-staff');
        Route::get('staff-detail/{id}','StaffController@showsDetailStaffWithPoint')->name('show-detail-staff');
        Route::delete('delete-detail-p-s/{id}','StaffController@delete_detail')->name('destroy-detils-points-staff');
        Route::get('bonus-staff/{id}','StaffController@showChooseBonusPointsForStaff')->name('show-bonus-staff');
        Route::post('save-bonus/{id}','StaffController@savePointOfStaff')->name('save-bonus');
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
        Route::group(['prefix' => 'departments'], function() {
            Route::get('index','DepartmentController@index')->name('admin.department.index');
            Route::get('create','DepartmentController@create')->name('admin.department.create');
            Route::post('store','DepartmentController@store')->name('admin.department.store');
            Route::get('show/{id}','DepartmentController@show')->name('admin.department.show');
            Route::get('edit/{id}','DepartmentController@edit')->name('admin.department.edit');
            Route::post('update/{id}','DepartmentController@update')->name('admin.department.update');
            Route::delete('delete/{id}','DepartmentController@destroy')->name('admin.department.destroy');
            Route::post('change-status','DepartmentController@changStatus')->name('admin.department.changstatus');
            Route::get('list-softdeletes','DepartmentController@listSoftDeletes')->name('admin.department.softdeletes');
            Route::get('restore/{id}','DepartmentController@restore')->name('admin.department.restore');
            Route::delete('forceDelete/{id}','DepartmentController@forceDelete')->name('admin.department.forceDelete');
        });
    });
});

// Route::get('/','HomeController@index')->name('home');
Route::get('test','PointController@index');
// Route::get('add-staff','StaffController@add_staff')->name('add-new-staff');

Route::namespace('Frontend')->group(function () {
    Route::group(['prefix' => 'home'], function() {
         Route::get('staff-detail-home/{id}','HomeController@detail')->name('show-detail-home');
         Route::get('search/{id}/{month}','HomeController@search')->name('search');
        });
});