<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Vue
Route::resource('testvues','Api\Testvuecontroller');

//Post
Route::resource('posts','Api\PostController');

//Forums
//Route::resource('forums','Api\Postcontroller');

//Solution
Route::resource('solutions','Api\SolutionController');

//Sale
Route::resource('sales','Api\SaleController');

//Staff
Route::resource('staffs','Api\StaffController');

//Company
Route::resource('companies','Api\CompanyController');

//Department
Route::resource('deps','Api\DepartmentController');

//Program
Route::resource('programs','Api\ProgramController');