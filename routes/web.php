<?php

use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\FeedbackController;

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
Route::get('/post/list', [PostController::class, 'displayPostList']);

Route::post('/upload', [UploadController::class, 'store']);
Route::get('/address/getwards', [AddressController::class, 'getAllWard']);


Route::prefix('/post')->middleware('auth')->group(
    function () {
        Route::get('/single/{id_post}', [PostController::class, 'displayPostSingle']);
        Route::get('/create', [PostController::class, 'displayCreatePost']);
        Route::get('/edit/{id_post}', [PostController::class, 'displayEditForm']);
        Route::post('/create', [PostController::class, 'createPost']);
        Route::post('/update', [PostController::class, 'updatePost']);
        Route::get('/delete/{id_post}', [PostController::class, 'deletePost']);
        Route::get('/interest/{id_post}', [PostController::class, 'interestPost']);
    }
);
Route::prefix('/feedback')->middleware('auth')->group(
    function () {
        Route::post('/create', [FeedbackController::class, 'createFeedback']);
        Route::get('/list', [FeedbackController::class, 'showFeedbacks']);
    }
);
Route::prefix('/admin')->middleware('admin_auth')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    Route::prefix('/user')->group(function () {
        Route::get('/list', [AdminUserController::class, 'displayUsersPage']);
        Route::get('/getuser', [AdminUserController::class, 'getUser']);
        Route::get('/create', [AdminUserController::class, 'displayCreateUser']);
        Route::post('/create', [AdminUserController::class, 'createUser']);
        Route::get('/update/{id_user}', [AdminUserController::class, 'displayUpdateUser']);
        Route::post('/update', [AdminUserController::class, 'updateUser']);
        Route::post('/delete', [AdminUserController::class, 'deleteUser']);
        Route::post('/block', [AdminUserController::class, 'blockUser']);
        Route::post('/unblock', [AdminUserController::class, 'unblockUser']);
    });
    Route::prefix('/feedback')->group(function () {
        Route::get('/list', [AdminFeedbackController::class, 'displayFeedbacks']);
    });
    Route::prefix('/post')->group(function () {
        Route::get('/list/{status}', [AdminPostController::class, 'displayPostsPage']);
        Route::get('/getpost', [AdminPostController::class, 'getPost']);
        Route::get('/approve/{id_posr}', [AdminPostController::class, 'approvePost']);
        Route::get('/reject/{id_posr}', [AdminPostController::class, 'rejectPost']);
    });
    Route::prefix('/service')->group(function () {
        Route::get('/list', [AdminServiceController::class, 'displayServicesPage']);
    });
});

Route::prefix('/profile')->middleware('auth')->group(
    function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/edit', [UserController::class, 'showEditForm']);
        Route::post('/update', [UserController::class, 'updateUserInfo']);
        Route::get('/post/{post_status}', [UserController::class, 'showPosts']);
        Route::get('/post', [UserController::class, 'postIndex']);
    }
);

Route::prefix('/user')->middleware('auth')->group(
    function () {
    }
);
