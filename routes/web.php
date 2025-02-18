<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\FamilyMemberController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

// routes/web.php

Route::get('/send-otp', [OtpController::class, 'sendOtp']);


Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::get('/contact', [HomePageController::class, 'contact_page'])->name('contact');



Route::middleware('auth:web')->group(function () {

    // Update User Profile
    Route::get('/user-profile', [UserDashboardController::class, 'profile'])->name('user.profile');
    Route::post('/profile-img', [ProfileController::class, 'profile_img'])->name('profile.image');
    Route::post('/update/userinformaton/', [UserDashboardController::class, 'updateUserInformation'])->name('profile.update');
    Route::post('/post/accepted', [JobController::class, 'store'])->name('post_enrolled');
    Route::post('/post/cancel', [JobController::class, 'cancelledData'])->name('enroledpost.cancel');

    // service offering from care taker
    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
    Route::post('/service/offer', [ServiceController::class, 'store'])->name('service.offer');
    
    Route::post('/accept/offer', [ServiceController::class, 'store_offer'])->name('accept_offer');
    
    Route::get('/pro/care/giver', [SubscriptionController::class, 'index'])->name('pro.plane');
    Route::get('/my_enrolled/job', [JobController::class, 'taker_enrolled'])->name('taker_enrolled');

    
    // Post
    Route::resource('/post', PostController::class);
    Route::resource('/job', JobController::class);
    Route::resource('/member', FamilyMemberController::class);
    Route::get('/requested/accepted/job', [JobController::class, 'requested_job'])->name('requested_job');
});


Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', function () {

        $data = [];

        // // Fetch Order data
        // $orders = Order::select(
        //     DB::raw('MONTH(created_at) as month'),
        //     DB::raw('COUNT(*) as count')
        // )
        // ->where('created_at', '>=', Carbon::now()->subYear())
        // ->groupBy('month')
        // ->orderBy('month')
        // ->get();

        // $orderData = array_fill(0, 12, 0);
        // foreach ($orders as $order) {
        //     $orderData[$order->month - 1] = $order->count;
        // }

        // $data['orderData'] = $orderData;

        // // Fetch complete order data
        // $orders = Order::select(
        //     DB::raw('MONTH(created_at) as month'),
        //     DB::raw('COUNT(*) as count')
        // )
        // ->where('status', 'Delivered')
        // ->where('created_at', '>=', Carbon::now()->subYear())
        // ->groupBy('month')
        // ->orderBy('month')
        // ->get();

        // $completeOrderData = array_fill(0, 12, 0);
        // foreach ($orders as $order) {
        //     $completeOrderData[$order->month - 1] = $order->count;
        // }

        // $data['completeOrderData'] = $completeOrderData;

        return view('Backend.Pages.dashboard', $data);
    })->middleware(['auth', 'verified'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Congigureation
    Route::resource('configuration', ConfigurationController::class);

    // Add New User
    Route::get('add-new-user/index', [AdminController::class, 'index'])->name('add-admin.index');
    Route::get('add-new-user/create', [AdminController::class, 'create'])->name('add-admin.create');
    Route::post('add-new-user/create', [AdminController::class, 'store'])->name('add-admin.store');
    Route::get('add-new-user/update/{admin}', [AdminController::class, 'edit'])->name('add-admin.edit');
    Route::put('add-new-user/update/{admin}', [AdminController::class, 'update'])->name('add-admin.update');
    Route::delete('add-new-user/destory/{admin}', [AdminController::class, 'destroy'])->name('add-admin.destroy');





});



require __DIR__.'/auth.php';
