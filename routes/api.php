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


// based on request like get, delete, post call particular method
Route::resource('posts', 'API\PostAPIController');

//fetch all data from employee table
Route::get('post', 'API\PostAPIController@index' );

// get data based on ip address in employee table
Route::get('search/{ip_address}', 'API\PostAPIController@show' );

// delete request based on ip address in employee table
Route::delete('delete/{ip_address}', 'API\PostAPIController@destroy' );


//fetch all data from employeeWebHistory table
Route::get('empweb', 'API\EmpWebController@index' );

// get data based on ip address in employee table
Route::get('empsearch/{ip_address}', 'API\EmpWebController@show' );

// delete request based on ip address in employee table
Route::delete('empdel/{ip_address}', 'API\EmpWebController@destroy' );

Route::post('emppost/{ip_address}', 'API\EmpWebController@store' );
