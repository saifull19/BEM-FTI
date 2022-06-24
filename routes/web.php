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
use App\Http\Controllers\Dashboard\EventController;
use App\Http\Controllers\Dashboard\MemberController;
use App\Http\Controllers\Dashboard\MateriController;
use App\Http\Controllers\Dashboard\MyOrderController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\RequestController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\MyClassController;
use App\Http\Controllers\Dashboard\ProgressController;
use App\Http\Controllers\Dashboard\ProgramKerjaController;
use App\Http\Controllers\Dashboard\DetailProgramKerjaController;
use App\Http\Controllers\Dashboard\StatusProgramController;
use App\Http\Controllers\UserController;

// model spatie
use Spatie\Activitylog\Models\Activity;


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

    // activity log
    Route::get('activity', function() {
        $activity = Activity::latest()->paginate(10);
        return view('pages.admin.activity-log', compact('activity'));
    })->name('activity.index');

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
    
    // order
    Route::resource('program', ProgramKerjaController::class);

    Route::resource('detail', DetailProgramKerjaController::class);
    
    // webinar
    Route::resource('event', EventController::class);
    
    // dashboard
    Route::resource('dashboard', MemberController::class);
    
    // service
    Route::resource('service', ServiceController::class);
    
    // service
    Route::resource('progress', ProgressController::class);

    // Materi
    Route::resource('materi', MateriController::class);

    // Class
    Route::resource('class', MyClassController::class);

    // request
    Route::get('approve_request/{id}', [RequestController::class, 'approve'])->name('approve.request');
    Route::resource('request', RequestController::class);
   

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
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');


