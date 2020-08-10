<?php
use Illuminate\Support\Facades\Auth;
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
Route::get('/', "SchedulesController@index")->name('schedules.index');
Route::get('/schedules', "SchedulesController@show")->name('schedules.show');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function (){
    Route::resource('companies', 'CompaniesController');
    Route::resource('users', 'UsersController');
    Route::resource('shifts', 'ShiftsController');
    Route::resource('schedules', 'SchedulesController')->except(['index', 'show']);
    Route::get('/ajax/users', 'AjaxController@users');
});
