<?php

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\MassageController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\DepartmentController;

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

Route::get('/employees', EmployeeController::class );
Route::get('/country',[ CountryController::class , 'index' ]);
Route::get('/department/{id}/data', [DepartmentController::class , 'getSingleDepartmentDate']);
Route::get('/departments', [DepartmentController::class , 'index'] );
Route::get('/department', [DepartmentController::class , 'getQueryData']);
Route::post('/send/data',MassageController::class);
Route::get('/region/data',[RegionController::class,'index']);

Route::controller(AuthController::class)->group(function(){
    Route::post('new/register','register');
    Route::post('logout','logout')->middleware('auth:sanctum');
    Route::post('login','login');

});
