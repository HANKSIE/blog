<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
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

Route::get('/', [BlogController::class, 'listPage']);

Route::get('/sign-in', [UserController::class, 'signInPage']);
Route::post('/sign-in', [UserController::class, 'signIn']);

Route::get('/sign-up', [UserController::class, 'signUpPage']);
Route::post('/sign-up', [UserController::class, 'signUp']);

Route::get('/sign-out', [UserController::class, 'signOut']);

Route::group(['prefix' => 'blog', 'middleware' => 'authcheck'], function () {

    Route::get('/create', [BlogController::class, 'createPage']);
    Route::post('/create', function () {
        return view('create',  [BlogController::class, 'create']);
    });

    Route::group(['prefix' => '{bid}'], function () {
        Route::get('/edit', function () {
            return view('edit');
        });
    });
});
