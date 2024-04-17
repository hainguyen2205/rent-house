<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AddressController;




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
Route::get('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::post('/upload', [UploadController::class, 'store']);
Route::get('/address/getwards', [AddressController::class, 'getAllWard']);


Route::prefix('/post')->middleware('auth')->group(
    function () {
        Route::get('/list', [PostController::class, 'displayPostList']);
        Route::get('/single/{id_post}', [PostController::class, 'displayPostSingle']);
        Route::get('/create', [PostController::class, 'displayCreatePost']);
        Route::get('/profile', [PostController::class, 'displayProfile']);
    }
);
Route::prefix('/admin')->middleware('admin_auth')->group(
    function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        });
    }
);
Route::prefix('/profile')->middleware('auth')->group(
    function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/edit', [UserController::class, 'edit']);
    }
);

Route::prefix('/user')->middleware('auth')->group(
    function () {
    }
);
