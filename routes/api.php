<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('tasks', TaskController::class)->except("edit", "create");



Route::options('/test-cors', function (Request $request) {
    return response('CORS Test')
        ->header('Access-Control-Allow-Origin', env('FRONTEND_URL', 'http://localhost:5173'))
        ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, DELETE, PUT')
        ->header('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Origin, Authorization');
});
