<?php

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

// PROJECTS
// Route::group([
//     'prefix' => 'barang'
// ], function (){
//     Route::post('create', [BarangController::class, 'createBarang']);
//     Route::get('read', [BarangController::class, 'readBarang']);
//     Route::get('readAll', [BarangController::class, 'readAllBarang']);
//     Route::put('update', [BarangController::class, 'updateBarang']);
//     Route::delete('delete', [BarangController::class, 'deleteBarang']);
// });