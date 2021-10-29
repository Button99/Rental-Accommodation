<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

    Route::post('/logout', [AuthController::class, 'logout']);

    // Accommodations 

    Route::post('/accommodation/create', [AccommodationController::class, 'create']);

    Route::delete('/accommodations/{id}/delete', [AccommodationController::class, 'delete']);

    Route::patch('/accommodations/{id}/update', [AccommodationController::class, 'update']);
});

Route::get('/', [AuthController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/signup', [AuthController::class, 'signup']);

Route::get('/accommodations', [AccommodationController::class, 'index']);

Route::get('/accommodations/{id}', [AccommodationController::class, 'show']);