<?php

use Illuminate\Support\Facades\Route;

// front (landing)
use App\Http\Controllers\Landing\LandingController;
// admin dashboard

use App\Http\Controllers\Dashboard\Admin\DashboardController;
use App\Http\Controllers\Dashboard\Admin\MentorController;
use App\Http\Controllers\Dashboard\Admin\MenuController;
use App\Http\Controllers\Dashboard\Admin\OrderController;
use App\Http\Controllers\Dashboard\Admin\ProfilController;
use App\Http\Controllers\Dashboard\Admin\RoleController;
use App\Http\Controllers\Dashboard\Admin\ServicController;
use App\Http\Controllers\Dashboard\Admin\WebinarController;

// member (dashboard)
use App\Http\Controllers\Dashboard\MemberController;
use App\Http\Controllers\Dashboard\MyOrderController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\RequestController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\MyClassController;
use App\Http\Controllers\Dashboard\ProgressController;
use App\Http\Controllers\UserController;


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
// midtrans routes
Route::get('payment/success', [LandingController::class, 'midtransCallback']);
Route::post('payment/success', [LandingController::class, 'midtransCallback']);

Route::get('corporate', [LandingController::class, 'corporate'])->name('corporate.landing');
Route::get('profesional', [LandingController::class, 'profesional'])->name('profesional.landing');
Route::get('detail_booking/{slug:created_at}', [LandingController::class, 'detail_booking'])->name('detail.booking.landing');
Route::get('booking/{id}', [LandingController::class, 'booking'])->name('booking.landing');
Route::get('detail/{slug:slug}', [LandingController::class, 'detail'])->name('detail.landing');
Route::get('explore', [LandingController::class, 'explore'])->name('explore.landing');
Route::resource('/', LandingController::class);

// route group menggunakan middleware admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified', 'admin']], function() {

    // dashboard
    Route::resource('dashboard', DashboardController::class);

    // service
    Route::resource('servic', ServicController::class);
    
    // order
    Route::resource('order', OrderController::class);
    
    // webinar
    Route::resource('webinar', WebinarController::class);

    // mentor
    Route::resource('mentor', MentorController::class);
    
    // role
    Route::resource('role', RoleController::class);
    
    // menu
    Route::resource('menu', MenuController::class);
    
    // profile
    Route::get('delete_photo', [ProfilController::class, 'delete'])->name('delete.photo.profile');
    Route::get('editt', [ProfilController::class, 'editt'])->name('profile.editt');
    Route::resource('profil', ProfilController::class);
});

// route group yang menggunakan middleware
Route::group(['prefix' => 'member', 'as' => 'member.', 'middleware' => ['auth:sanctum', 'verified']], function() {
    
    // dashboard
    Route::resource('dashboard', MemberController::class);
    
    // service
    Route::get('submit-materi', [ServicController::class, 'materi'])->name('service.materi');
    Route::resource('service', ServiceController::class);
    
    // request
    Route::get('approve_request/{id}', [RequestController::class, 'approve'])->name('approve.request');
    Route::resource('request', RequestController::class);
   
    // service
    Route::resource('progress', ProgressController::class);

    // service
    Route::resource('class', MyClassController::class);

    // My order
    Route::get('accept/order/{id}', [MyOrderController::class, 'accepted'])->name('accept.order');
    Route::get('reject/order/{id}', [MyOrderController::class, 'rejected'])->name('reject.order');
    Route::resource('order', MyOrderController::class);

    // profile
    Route::get('delete_photo', [ProfileController::class, 'delete'])->name('delete.photo.profile');
    Route::get('editt', [ProfileController::class, 'editt'])->name('profile.editt');
    Route::resource('profile', ProfileController::class);
});




// route socialite
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');




// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
