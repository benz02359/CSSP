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
    return view('web.welcome');
});

Route::get('/test', function () {
    return view('web.testvue');
});
//Route::get('/', 'HomeController@index')->name('home');
//Auth::routes();
{
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

    Route::get('registeradmin', 'Auth\RegisterController@registeradmin')->name('registeradmin');
    Route::get('registerstaff', 'Auth\RegisterController@registerstaff')->name('registerstaff');
    Route::get('registeragent', 'Auth\RegisterController@registeragent')->name('registeragent');
    Route::get('registeruser', 'Auth\RegisterController@registeruser')->name('registeruser');
    Route::post('regisadmin', 'Auth\RegisterController@regisadmin');


    Route::post('register', 'Auth\RegisterController@register');


    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
}
//Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/', 'HomeController@index');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/solutions', 'SolutionController@index')->name('solution');
Route::get('/report', 'HomeController@report')->name('report');
Route::get('/forum', 'HomeController@forum')->name('forum');
Route::get('/help', 'HomeController@help')->name('help');
Route::get('/submit', 'HomeController@submit')->name('submit');

Route::get('admin', 'HomeController@solution')->name('admin');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adminpage', 'AdminController@index');
Route::get('/aboutpage', 'AboutController@index');
Route::get('/solutionpage', 'SolutionController@index');


//Vue
Route::resource('testvues','Testvuecontroller');
//Route::resource('createvues','Testvuecontroller');
