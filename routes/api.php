<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\BookPageController;
use App\Http\Controllers\Api\PdfController;
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

Route::get('search-book-pages', [BookPageController::class, 'search']);
Route::get('get-pdf', [PdfController::class, 'view']);
Route::get('/books/{id}', [BookController::class, 'show']);
