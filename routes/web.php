<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\BookController;

Route::resource('books', BookController::class);

use App\Http\Controllers\CategoryController;

Route::resource('categories', CategoryController::class);

use App\Http\Controllers\MemberController;

// Route to display the create form
Route::resource('members', MemberController::class);

use App\Http\Controllers\LoanController;

Route::resource('loans', LoanController::class);
