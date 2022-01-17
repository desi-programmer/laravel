<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicRouter;

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

Route::get('/', function(Request $request){
    $data = [
        'message' => "Welcome"
    ];
    return $data;
});

// GET, POST, PUT and DELETE Route 
Route::get('/routes', function(Request $request){
    $data = [
        'message' => "A GET Request Route"
    ];
    return $data;
});

Route::post('/routes', function(Request $request){
    $data = [
        'message' => "A POST Request Route"
    ];
    return $data;
});

Route::put('/routes', function(Request $request){
    $data = [
        'message' => "A PUT Request Route"
    ];
    return $data;
});

Route::delete('/routes', function(Request $request){
    $data = [
        'message' => "A DELETE Request Route"
    ];
    return $data;
});

// Handle all Methods 
Route::any('/any', function(Request $request){
    $data = [
        'message' => $request->method(),
    ];
    return $data;
});

// Handle some specific Methods
Route::match(['get', 'post'], '/specific', function (Request $request) {
    $data = [
        'message' => $request->method(),
    ];
    return $data;
});


// Using a Controller 
Route::get('/posts/{id}', [BasicRouter::class, 'index']);
Route::post('/posts', [BasicRouter::class, 'create']);
Route::get('/params/{username?}', [BasicRouter::class, 'params']);

// Middlewares

Route::any('/log', function (Request $request){
    error_log($request->method()." Request");
    return "Welcome";
});