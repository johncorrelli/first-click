<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/create');
});

Route::get('/claim/{claimId}', 'App\Http\Controllers\ClaimController@checkClaim');
Route::get('/claim/{claimId}/take', 'App\Http\Controllers\ClaimController@takeClaim');

Route::get('/create', 'App\Http\Controllers\ClaimController@createClaimForm');
Route::post('/create/save', 'App\Http\Controllers\ClaimController@createClaim');
