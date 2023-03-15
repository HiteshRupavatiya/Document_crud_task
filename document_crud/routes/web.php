<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDocumentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('login-view', 'loginUser')->name('login-view');
    Route::post('login', 'login')->name('login');
    Route::get('register-view', 'registerUser')->name('register-view');
    Route::post('register', 'register')->name('register');
    Route::get('logout', 'logout')->name('logout');
    Route::get('home', 'home')->name('home');
});

Route::controller(UserDocumentController::class)->prefix('user-document')->group(function () {
    Route::get('index', 'index')->name('user-document.index');
    Route::get('create', 'create')->name('user-document.create');
    Route::post('store', 'store')->name('user-document.store');
    Route::get('edit/{id}', 'edit')->name('user-document/edit');
    Route::put('update/{id}', 'update')->name('user-document.update');
    Route::delete('delete/{id}', 'delete')->name('user-document.delete');
});

Route::controller(DocumentController::class)->prefix('document')->group(function () {
    Route::get('index', 'index')->name('document.index');
    Route::get('create', 'create')->name('document.create');
});
