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

Route::get('/claim/{claimId}', 'App\Http\Controllers\TakeClaimController@checkClaim');
Route::post('/claim/{claimId}/take', 'App\Http\Controllers\TakeClaimController@takeClaim');

Route::get('/create', 'App\Http\Controllers\CreateClaimController@createClaimForm');
Route::post('/create/save', 'App\Http\Controllers\CreateClaimController@createClaim');
Route::post('/create/save-prize', 'App\Http\Controllers\CreateClaimController@createClaimPrize');
Route::post('/create/finalize-claim', 'App\Http\Controllers\CreateClaimController@finalizeClaim');
