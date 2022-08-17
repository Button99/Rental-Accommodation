<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
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

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function() {
    
    // Users

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::delete('/settings/user/{id}/delete', [UserController::class, 'delete']);

    Route::put('/settings/user/{id}/changePassword', [UserController::class, 'changePassword']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/settings/user/{id}/changeData', [UserController::class, 'changeUserData']);

    Route::post('/settings/user/{id}/changePhone', [UserController::class, 'changePhone']);

    // Accommodations 

    Route::get('/{id}/myAccommodations', [AccommodationController::class, 'showMyAccommodations']);

    Route::post('/accommodation/create', [AccommodationController::class, 'store']);

    Route::delete('/accommodations/{id}/delete', [AccommodationController::class, 'delete']);

    Route::put('/accommodations/{id}/update', [AccommodationController::class, 'update']);

    Route::post('/accommodations/createComment', [CommentController::class, 'store']);

    // Need to create 1 more table for rating
    Route::post('/accommodations/{id}/rate', [RateController::class, 'addRate']);

});

Route::get('/', [AuthController::class, 'index']);

Route::get('/verifyEmail/vkey/{vkey}', [VerificationController::class, 'index']);

Route::get('/showComments', [CommentController::class, 'index']);

Route::post('/forgotPassword', [UserController::class, 'forgotPassword']);

Route::get('/search/accommodations', [AccommodationController::class, 'search']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/signup', [AuthController::class, 'signup']);

Route::post('/resetPsw', [UserController::class, 'resetPassword']);

Route::get('/accommodations', [AccommodationController::class, 'index']);

Route::get('/location', [LocationController::class, 'getLocation']);

Route::get('/accommodations/{id}', [AccommodationController::class, 'show']);
