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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Vue js Api Route

Route::apiResources(
	[
		'user' => 'API\UserController',
		// 'user_department' => 'API\UserDepartmentController'
	]
);

Route::get('user_department', 'API\UserDepartmentController@index')->name('user_list');
Route::get('user_department/get_users', 'API\UserDepartmentController@getDataUser')->name('user_list');

