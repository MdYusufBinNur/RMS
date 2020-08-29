<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true] );
Route::post('/login', 'Admin\ApiController@userLogin');

Route::group(['namespace' => 'Admin'], function () {

    Route::post('/reset_password', 'ApiController@reset'); //done

    Route::post('/constructors', 'ConstructorController@store_from_api'); //done

    Route::resource('comments', 'CommentController')->only('store');

    Route::post('/members', 'MemberController@store');

    Route::post('logout', 'ApiController@logout');

    Route::post('verify_email', 'ApiController@verify_email');

});
Route::group(['namespace' => 'Admin', 'middleware' => 'auth:api'], function () {

    Route::get('/members', 'ApiController@all_members');

    Route::get('/constructors', 'ApiController@all_constructors');
   //done

    Route::post('/previous_comments', 'ApiController@previous_comments');

    Route::post('/comments_of_a_task', 'ApiController@comments_of_a_task');

    Route::post('/previous_comments_of_a_task', 'ApiController@previous_comments_of_a_task');

    Route::post('/all_reports', 'ApiController@all_reports');

    Route::post('/task_done', 'ApiController@task_done');

    Route::post('/all_finished_task', 'ApiController@all_finished_task');

    Route::post('/all_pending_task', 'ApiController@all_pending_task');

    Route::resource('reports', 'ReportController')->only('store');




});
Route::post('/password/email', 'Api\ForgotPasswordController@sendResetLinkEmail'); // send a reset link to email
Route::post('/password/reset', 'Api\ResetPasswordController@reset');

Route::post('/verify/email', 'Api\VerificationController@resend'); // send a verification link to email
Route::post('/verified', 'Api\VerificationController@verify'); // Verify Email
Route::get('get_all_task_comments/{member_id}', 'Admin\ApiController@get_all_task_comments');

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


