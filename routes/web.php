<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveRequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('leave-requests', LeaveRequestController::class);
// React calls this api
Route::get('/api/leave-requests', [LeaveRequestController::class, 'all']);
Route::get('/leave-requests/create', [LeaveRequestController::class, 'create'])->name('leave-requests.create');
Route::post('/leave-requests', [LeaveRequestController::class, 'store'])->name('leave-requests.store');
Route::get('/leave-requests', [LeaveRequestController::class, 'index'])->name('leave-requests.index');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('welcome');
})->name('welcome');