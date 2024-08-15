<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveRequestController;


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
Route::apiResource('leave-requests', LeaveRequestController::class);
// Route::get('/leave-requests', [LeaveRequestController::class, 'index']);
// Route::post('/leave-requests', [LeaveRequestController::class, 'store']);
// Route::put('/leave-requests/{id}', [LeaveRequestController::class, 'update']);
// Route::delete('/leave-requests/{id}', [LeaveRequestController::class, 'destroy']);
