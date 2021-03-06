<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

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

Route::get('/', function (Request $request) {
    return [
        "message" => "Welcome"
    ];
});


// Auth Routes 

Route::post('/user/register', [AuthController::class , 'register']);
Route::post('/user/login', [AuthController::class , 'login']);

// a protected route
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user/logout', [AuthController::class , 'logout']);
    Route::get('/user/profile', [AuthController::class , 'profile']);
});

Route::post('/user/send_otp', [AuthController::class , 'send_otp']);
Route::post('/user/change_password', [AuthController::class , 'change_password']);