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
    Route::get('/',"DashboardController@index")->name('dashboard');

    Route::prefix('marcas')->name('marcas.')->group(function () {
        Route::get('/',"MarcaController@index")->name('index');
        Route::get("/cadastro", "MarcaController@create")->name('create');
        Route::post("/cadastro/salvar", "MarcaController@store")->name('store');
        Route::get('/{marca_id}/editar', "MarcaController@edit")->name('editar');
        Route::put('/{marca_id}/update', "MarcaController@update")->name('update');
        Route::delete('/{marca_id}/delete',"MarcaController@delete")->name('delete');
    });

    Route::prefix('produtos')->name('produtos.')->group(function () {
        Route::get('/',"ProdutoController@index")->name('index');
        Route::get("/cadastro", "ProdutoController@create")->name('create');
        Route::post("/cadastro/salvar", "ProdutoController@store")->name('store');
        Route::get('/{produto_id}/editar', "ProdutoController@edit")->name('editar');
        Route::put('/{produto_id}/update', "ProdutoController@update")->name('update');
        Route::delete('/{produto_id}/delete',"ProdutoController@delete")->name('delete');
    });
});
