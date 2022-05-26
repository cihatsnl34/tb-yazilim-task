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

require __DIR__ . '/auth.php';


Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/user', function () {
    return redirect('/user/login');
});
Route::post('register','RegisterController@store')->name('register');
        Route::get('register', function () {
            return view('register');
        });

//User
Route::namespace('User')->prefix('user')->name('user.')->group(function () {
    Route::namespace('Auth')->middleware('guest:user')->group(function () {
        //login route
        Route::get('login', 'AuthenticatedSessionController@create')->name('login');
        Route::post('login', 'AuthenticatedSessionController@store')->name('userlogin');
    });
    Route::middleware('user')->group(function () {
        Route::get('dashboard', 'HomeController@index')->name('dashboard');
        Route::get('profilEdit', 'HomeController@profilEdit')->name('profilEdit');
        Route::post('profilUpdate/{id}', 'HomeController@profilUpdate')->name('profilUpdate');
       
    });
    Route::get('logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');
});