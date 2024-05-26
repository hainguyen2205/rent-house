<?php

use App\Http\Controllers\Admin\AdminDashBoardController;
use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Admin\AdminTypeHouseController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminTopupController;
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
Route::get('/news',  [HomeController::class, 'displayNewsPage']);
Route::get('/news/share-tips',  [HomeController::class, 'displayShareTipsPage']);
Route::get('/news/scam-warnings',  [HomeController::class, 'displayScamWarningPage']);
Route::get('/news/tips-for-posting',  [HomeController::class, 'displayTipsPostingPage']);
Route::get('/news/posting-rules',  [HomeController::class, 'displayPostingRulesPage']);
Route::get('/faq',[HomeController::class, 'displayFaqPage']);

Route::post('/upload', [UploadController::class, 'store']);
Route::get('/address/getwards', [AddressController::class, 'getAllWard']);


Route::prefix('/post')->middleware('auth')->group(
    function () {
        Route::get('/single/{id_post}', [PostController::class, 'displayPostSingle']);
        Route::get('/create', [PostController::class, 'displayCreatePost']);
        Route::get('/edit/{id_post}', [PostController::class, 'displayEditForm']);  

        Route::post('/create', [PostController::class, 'createPost']);
        Route::post('/update', [PostController::class, 'updatePost']);
        Route::post('/delete', [PostController::class, 'deletePost']);
        Route::post('/hide', [PostController::class, 'hidePost']);
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
    Route::get('/', [AdminDashBoardController::class, 'displayDashBoardPage']);
    Route::get('/get-monthly-revenue', [AdminDashBoardController::class, 'getMonthlyRevenue']);
    Route::get('/get-post-count-district', [AdminDashBoardController::class, 'getPostCountByDistrict']);

    Route::prefix('/user')->group(function () {
        Route::get('/list', [AdminUserController::class, 'displayUsersPage']);
        Route::get('/getuser', [AdminUserController::class, 'getUser']);
        Route::get('/create', [AdminUserController::class, 'displayCreateUser']);
        Route::get('/update/{id_user}', [AdminUserController::class, 'displayUpdateUser']);

        Route::post('/create', [AdminUserController::class, 'createUser']);
        Route::post('/update', [AdminUserController::class, 'updateUser']);
        Route::post('/delete', [AdminUserController::class, 'deleteUser']);
        Route::post('/block', [AdminUserController::class, 'blockUser']);
        Route::post('/unblock', [AdminUserController::class, 'unblockUser']);
    });
    Route::prefix('/feedback')->group(function () {
        Route::get('/list', [AdminFeedbackController::class, 'displayFeedbacks']);
        Route::get('/getfeedback', [AdminFeedbackController::class, 'getFeedback']);
        Route::post('/reply', [AdminFeedbackController::class, 'replyFeedback']);
    });
    Route::prefix('/post')->group(function () {
        Route::get('/list/{status}', [AdminPostController::class, 'displayPostsPage']);
        Route::get('/getpost', [AdminPostController::class, 'getPost']);
        Route::get('/create', [AdminPostController::class, 'displayCreatePost']);
        Route::get('/edit/{id_post}', [AdminPostController::class, 'displayEditPost']);

        Route::post('/create', [AdminPostController::class, 'createPost']);
        Route::post('/update', [AdminPostController::class, 'updatePost']);
        Route::post('/approve', [AdminPostController::class, 'approvePost']);
        Route::post('/reject', [AdminPostController::class, 'rejectPost']);
        Route::post('/delete', [AdminPostController::class, 'deletePost']);
    });
    Route::prefix('/service')->group(function () {
        Route::get('/list', [AdminServiceController::class, 'displayServicesPage']);
        Route::get('/getservice', [AdminServiceController::class, 'getService']);
        Route::post('/create', [AdminServiceController::class, 'createService']);
        Route::post('/update', [AdminServiceController::class, 'updateService']);
    });
    Route::prefix('/type-house')->group(function () {
        Route::get('/list', [AdminTypeHouseController::class, 'displayTypeHousePage']);
        Route::get('/get', [AdminTypeHouseController::class, 'get']);
        Route::post('/create', [AdminTypeHouseController::class, 'create']);
        Route::post('/update', [AdminTypeHouseController::class, 'update']);
    });
    Route::prefix('/topup')->group(function () {
        Route::get('/', [AdminTopupController::class, 'displayHistoryTopupPage']);
        Route::post('/success', [AdminTopupController::class, 'setTopupSuccess']);
        Route::post('/cancel', [AdminTopupController::class, 'setTopupCancel']);
    });
});

Route::prefix('/profile')->middleware('auth')->group(
    function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/edit', [UserController::class, 'showEditForm']);
        Route::post('/update', [UserController::class, 'updateUserInfo']);
        Route::get('/post/{post_status}', [UserController::class, 'showPosts']);
        Route::get('/post', [UserController::class, 'postIndex']);
        
        Route::prefix('/topup')->group(function () {
            Route::get('/',function(){
                return view('user.topup.index');
            });
            Route::get('/vnpay',function(){
                return view('user.topup.vnpay');
            });
            Route::get('/vietqr',function(){
                return view('user.topup.vietqr');
            });
            Route::get('/history', [UserController::class, 'displayHistoryTopUp']);
            Route::post('vietqr-checkout', [PaymentController::class, 'vietqrCheckOut']);
            Route::get('/vietqr-result', [PaymentController::class, 'vietqrGetResult'])->name('vietqr-return');
            Route::post('/vnpay-checkout', [PaymentController::class, 'vnpayCheckOut']);
            Route::get('/vnpay-result', [PaymentController::class, 'vnpayGetResult'])->name('vnpay-return');
        });
        
    }
);
