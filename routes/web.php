<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
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

Route::prefix('api/v1')->group(function () {
    Route::get('/products',[ ProductController::class, 'get']);
    Route::post('/products',[ ProductController::class, 'create']);
    Route::get('/{id}',[ ProductController::class, 'getById']);
    Route::put('/{id}',[ ProductController::class, 'update']);
    Route::delete('/{id}',[ ProductController::class, 'delete']);
});
