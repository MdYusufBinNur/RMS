<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");


//;

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::post('/login', 'Admin\ApiController@userLogin');

Route::group(['namespace' => 'Admin'], function () {
    Route::resource('members', 'MemberController')->only('store'); //done
//    Route::middleware('auth:api')->resource('comments', 'CommentController')->only('store','index');
    Route::resource('comments', 'CommentController')->only('store');

    Route::post('/previous_comments', 'ApiController@previous_comments');

    Route::post('/comments_of_a_task', 'ApiController@comments_of_a_task');

    Route::post('/previous_comments_of_a_task', 'ApiController@previous_comments_of_a_task');

    Route::post('/all_reports', 'ApiController@all_reports');

    Route::post('/task_done', 'ApiController@task_done');

    Route::post('/all_finished_task', 'ApiController@all_finished_task');

    Route::post('/all_pending_task', 'ApiController@all_pending_task');

    Route::resource('reports', 'ReportController')->only('store');

    Route::middleware('auth:api')->post('logout', 'ApiController@logout');

});

/*Route::middleware('auth:api')->post('logout', function (Request $request) {

    if (auth()->user()) {
        $user = auth()->user();
        $user->remember_token = null; // clear  token
        $user->save();

        return response()->json([
            'message' => 'Thank you for using our application',
        ]);
    }

    return response()->json([
        'error' => 'Unable to logout user',
        'code' => 401,
    ], 401);
});*/


