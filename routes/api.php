<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use vidyasmasani\ThroattleReferrerApp\Throattle;
use App\Http\Controllers\UserController;
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

Route::middleware(['throttle:referrer_req'])->group(function () {
    Route::get('/access/{limit?}', [UserController::class, 'access']);     
});