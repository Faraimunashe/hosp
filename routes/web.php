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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    //dashboard
    Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@index')->name('admin-dashboard');

    //patient
    Route::get('/admin/patients', 'App\Http\Controllers\admin\PatientController@index')->name('admin-patients');
    Route::post('/admin/patient/collect', 'App\Http\Controllers\admin\PatientController@collect')->name('admin-patient-collect');

    //collections
    Route::get('/admin/collections', 'App\Http\Controllers\admin\CollectController@index')->name('admin-collections');

    //facilities
    Route::get('/admin/facilities', 'App\Http\Controllers\admin\HospitalController@index')->name('admin-hospitals');
    Route::post('/admin/facility/add', 'App\Http\Controllers\admin\HospitalController@add')->name('admin-add_hospital');
    Route::post('/admin/facility/edit', 'App\Http\Controllers\admin\HospitalController@edit')->name('admin-edit_hospital');
    Route::get('/admin/delete/facility', 'App\Http\Controllers\admin\HospitalController@delete')->name('admin-delete-hospital');

});

Route::group(['middleware' => ['auth', 'role:user']], function () {
    //dashboard
    Route::get('/user/dashboard', 'App\Http\Controllers\user\DashboardController@index')->name('user-dashboard');

    //maps
    Route::get('/user/near-by', 'App\Http\Controllers\user\MapController@index')->name('user-map');

});

require __DIR__.'/auth.php';
