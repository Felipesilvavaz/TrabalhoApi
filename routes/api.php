<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

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
Route::get('show', [TaskController::class, 'show']);
Route::get('taskId/{id}', [TaskController::class, 'taskId']);

Route::post('addTask', [TaskController::class, 'addTask']);

Route::get('edit/{id}', [TaskController::class, 'edit']);
Route::put('edit/{id}', [TaskController::class, 'update']);

Route::delete('delete/{id}', [TaskController::class, 'delete']);