<?php
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\PairController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ConversionController;
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

// Routes pour l'administrateur

Route::apiResource('admin/currencies', CurrencyController::class)->middleware('auth:sanctum');
Route::apiResource('admin/pairs', PairController::class)->middleware('auth:sanctum');
Route::post('admin/auth/register', [AuthController::class, 'register']);
Route::post('admin/auth/login', [AuthController::class, 'login']);


// Route pour faire une conversion

Route::post('client/conversion', [ConversionController::class, 'conversion']);