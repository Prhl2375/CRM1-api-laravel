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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['auth:sanctum', 'role'])->get('/users', [\App\Http\Controllers\UserController::class, 'showAction']);


Route::middleware(['auth:sanctum', 'role'])->delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroyAction']);


Route::get('/test-auth', function (Request $request){
    if($request->user()){
        if($request->user()->is_admin){
            return 'admin';
        }else{
            return 'user';
        }
    }else {
        return 'guest';
    }
});
