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
use Illuminate\Broadcasting\BroadcastController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/messages', 'MessagesController@getMessages');
Route::post('/message', 'MessagesController@postMessage')->middleware('auth');
Route::post('/login', 'LoginController@login');

Route::post('/broadcasting/auth', '\\'.BroadcastController::class.'@authenticate')->middleware('broadcast');