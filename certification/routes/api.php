<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DetailLoanController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
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

// Loan
Route::group([
    'prefix' => 'loan'
], function (){
    Route::post('create', [LoanController::class, 'createLoan']);
    Route::get('read', [LoanController::class, 'readLoan']);
    Route::get('readAll', [LoanController::class, 'readAllLoan']);
    Route::get('readAllLoanMember', [LoanController::class, 'readAllLoanMember']);
    Route::put('update', [LoanController::class, 'updateLoan']);
    Route::delete('delete', [LoanController::class, 'deleteLoan']);
});

// Detail Loan
Route::group([
    'prefix' => 'detailLoan'
], function (){
    // Route::post('create', [LoanController::class, 'createDetailLoan']);
    Route::get('read', [DetailLoanController::class, 'readDetailLoan']);
    // Route::get('readAll', [LoanController::class, 'readAllDetailLoan']);
    // Route::put('update', [LoanController::class, 'updateDetailLoan']);
    // Route::delete('delete', [LoanController::class, 'deleteDetailLoan']);
});

// Book
Route::group([
    'prefix' => 'book'
], function (){
    Route::post('create', [BookController::class, 'createBook']);
    Route::get('read', [BookController::class, 'readBook']);
    Route::get('readByAvailability', [BookController::class, 'readBookbyAvailability']);
    Route::get('readAll', [BookController::class, 'readAllBook']);
    Route::put('update', [BookController::class, 'updateBook']);
    Route::delete('delete', [BookController::class, 'deleteBook']);
});

// Member
Route::group([
    'prefix' => 'member'
], function (){
    Route::post('create', [MemberController::class, 'createMember']);
    Route::get('read', [MemberController::class, 'readMember']);
    Route::get('readAll', [MemberController::class, 'readAllMember']);
    Route::put('update', [MemberController::class, 'updateMember']);
    Route::delete('delete', [MemberController::class, 'deleteMember']);
});