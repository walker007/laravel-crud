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


Route::middleware(['guest'])->group(function () {
    Route::get('login', "Auth\LoginController@index")->name('login');
    Route::post('login', "Auth\LoginController@login")->name('login');
    Route::get('registrar', "Auth\RegisterController@index")->name('register');
    Route::post('registrar', "Auth\RegisterController@store")->name('register');
});

Route::post('/logout','Auth\LoginController@logout')->name('logout');

Route::name('verification.')->prefix('email')->middleware(['auth'])->group(function(){
    Route::get('/verify/notice', "DashboardController@emailNotice")->name('notice');
    Route::get('/verify/{id}/{hash}', "Auth\RegisterController@verifyEmail")
        ->middleware('signed')->name('verify');
    Route::post('/email/verification-notification',"Auth\RegisterController@resend")
        ->middleware('throttle:6,1')->name('send');
});

Route::middleware(['guest'])->name('password.')->prefix('password')->group(function () {
    Route::get("request", "Auth\ForgotPasswordController@requestPassword")->name('request');
    Route::post("request/email", "Auth\ForgotPasswordController@requestEmail")->name('email');
    Route::get('/reset/{token}', "Auth\ForgotPasswordController@resetPassword")->name('reset');
    Route::post("reset/update", "Auth\ForgotPasswordController@updatePassword")->name('update');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home',"DashboardController@index")->name('dashboard');
});
