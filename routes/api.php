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


Route::middleware(['auth:sanctum', 'role'])->get('/users', function (){


    $users = (object)[
        'data' => \App\Models\User::all(),
        'columns' => \Illuminate\Support\Facades\Schema::getColumnListing('users')
    ];
    return $users;
});


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
