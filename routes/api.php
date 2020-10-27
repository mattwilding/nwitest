<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SubmissionsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/submissions', [SubmissionsController::class, 'index']);

Route::get('/submissions/{id}', [SubmissionsController::class, 'show']);

Route::post('/submissions/new', [SubmissionsController::class, 'store']);

Route::post('/submissions/update/{id}', [SubmissionsController::class, 'update']);

Route::post('/submissions/delete/{id}', [SubmissionsController::class, 'destroy']);
