<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [HomeController::class, 'displayLoginForm']);
Route::get('/register', [HomeController::class, 'displayRegisterForm']);


Route::prefix('/post')->group(function () {
    Route::get('/list', function () {
        return view('post.list');
    });
    Route::get('/single', function () {
        return view('post.single');
    });
    Route::get('/create', function () {
        return view('post.create');
    });
}
);


