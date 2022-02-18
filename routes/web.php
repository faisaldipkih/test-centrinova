<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListEntryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('detail/{slug}', [DetailController::class, 'index']);

Route::get('/comment/{id}', [CommentController::class, 'index'])->middleware('auth');
Route::post('/comment/store', [CommentController::class, 'store']);
Route::get('/comment-manag/delete/{id}', [CommentController::class, 'delete']);

Route::get('list-entry', [ListEntryController::class, 'index'])->middleware('auth');

Route::post('/list-entry/store', [ListEntryController::class, 'store']);
Route::post('/list-entry/update', [ListEntryController::class, 'update']);
Route::get('/list-entry/delete/{slug}', [ListEntryController::class, 'delete']);

Route::get('/form-entry', function () {
    return view('form_entry');
});

Route::get('/form-entry/{slug}', [ListEntryController::class, 'edit']);

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/logout', [AuthController::class, 'logout']);
Route::get('/auth/update-profile', [AuthController::class, 'update_profile']);
Route::post('/auth/update', [AuthController::class, 'update']);

Route::get('/user-management', [UserController::class, 'index']);
Route::get('/form-user', function () {
    return view('form_user');
});
Route::post('/user-management/store', [UserController::class, 'store']);
Route::get('/user-management/reset/{id}', [UserController::class, 'reset']);
