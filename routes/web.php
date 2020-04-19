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

Route::get('/', function () {
    return view('front');
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/home', 'BerandaController@index')->name('home');
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');
  Route::get('/logout', 'AdminAuth\LoginController@logout')->name('logout');
  Route::get('/admin', function () {
      return redirect('/admin/login');
  });
  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  //Route untuk halaman nelayan
  Route::resource('/profil', 'AdminController', [
      'only' => ['index','update','destroy','store']
  ]);
  Route::get('/datanelayan', 'ShowNelayanDataController@index')->name('datanelayan');
  Route::get('/petanelayan', 'ShowNelayanDataController@index')->name('datanelayan');
  Route::resource('/ikan', 'FishController', [
      'only' => ['index','update','destroy','store']
  ]);
  //Route untuk halaman update harga ikan
  Route::resource('/harga', 'FishPriceController', [
      'only' => ['index','update','destroy','store']
  ]);
  //Route untuk halaman lokasi ikan
  Route::resource('/lokasi', 'FishLocationController', [
      'only' => ['store']
  ]);
  //Route untuk halaman total tangkapan ikan
  Route::resource('/tangkapan', 'FishCatchController', [
      'only' => ['store']
  ]);
});

Auth::routes();
//Direct Logout
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/peta', 'HomeController@peta')->name('home');

//Route untuk halaman nelayan
Route::resource('/profil', 'NelayanController', [
    'only' => ['index','update']
]);

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
