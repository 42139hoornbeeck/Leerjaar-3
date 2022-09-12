<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\EmployeeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/companies', CompanyController::class)->middleware('ForceJSONReponse', 'auth:sanctum');

Route::apiResource('/employee', EmployeeController::class)->middleware('ForceJSONReponse', 'auth:sanctum');

Route::post('/tokens/create', [AuthController::class, 'token']);

Route::post('/auth/register', [AuthController::class, 'createUser'])->middleware('ForceJSONReponse');

Route::post('/auth/login', [AuthController::class, 'loginUser'])->middleware('ForceJSONReponse');