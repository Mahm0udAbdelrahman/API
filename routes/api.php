<?php

use App\Http\Controllers\Api\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeController;

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

Route::get('/setting', EmployeeController::class );
Route::get('/department/{id}/data', [DepartmentController::class , 'getSingleDepartmentDate'] );
Route::get('/departments', [DepartmentController::class , 'index'] );
