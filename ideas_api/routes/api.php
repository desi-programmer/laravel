<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IdeasController;

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
        "msg" => "Welcome"
    ];
});


Route::get('/ideas', [IdeasController::class, 'index']);
Route::post('/ideas', [IdeasController::class, 'store']);
Route::put('/ideas/{id}', [IdeasController::class, 'update']);
Route::delete('/ideas/{id}', [IdeasController::class, 'destroy']);