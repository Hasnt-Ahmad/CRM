<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/add-contact', function () {
    return view('addContact');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post("/add-contact","App\Http\Controllers\ContactController@addContact");
Route::get('/contacts', "App\Http\Controllers\ContactController@displayContact");
Route::get('/edit/{id}', "App\Http\Controllers\ContactController@editContact");
Route::post("/update-contact/{id}","App\Http\Controllers\ContactController@updateContact");
Route::post("/search","App\Http\Controllers\ContactController@displayContact");
Route::get("/delete/{id}","App\Http\Controllers\ContactController@deleteContact");

Route::get("/tags", "App\Http\Controllers\TagController@displayTag");
Route::post("/add-tag","App\Http\Controllers\TagController@addTag");


Route::get("/add-activity", "App\Http\Controllers\ActivityController@showActivity");
Route::get("/activity", "App\Http\Controllers\ActivityController@displayActivity");
Route::get("/edit-activity/{id}","App\Http\Controllers\ActivityController@editActivity");
Route::get("/activity-log","App\Http\Controllers\ActivityController@displayActivityLog");
Route::post("/update-activity/{id}","App\Http\Controllers\ActivityController@updateActivity");
Route::post("/add-activity","App\Http\Controllers\ActivityController@addActivity");

Route::get("/export-contact","App\Http\Controllers\ContactController@exportContact");




