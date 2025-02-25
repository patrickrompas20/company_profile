<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('layouts.front.app');
// });


Route::get('/login', function () {
    // Check if the user is authenticated
    if (auth()->check()) {
        // If authenticated, redirect to admin.dashboard.index
        return redirect()->route('admin.dashboard.index');
    }
    // If not authenticated, show the login view
    return view('auth.login');
});

// Login
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class])->name('login');


// Menonaktifkan register
Auth::routes(['register' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('front.home.index');

// Blog (front)
Route::get('/blog', [App\Http\Controllers\Front\BlogController::class, 'index'])->name('front.blog.index');
Route::get('/blog/{slug}', [App\Http\Controllers\Front\BlogController::class, 'show'])->name('front.blog.show');

// About (front)
Route::get('/about', [App\Http\Controllers\Front\AboutController::class, 'index'])->name('front.about.index');

// Service (front)
Route::get('/service', [App\Http\Controllers\Front\ServiceController::class, 'index'])->name('front.service.index');
Route::get('/service/{slug}', [App\Http\Controllers\Front\ServiceController::class, 'show'])->name('front.service.show');

// Project (front)
Route::get('/project', [App\Http\Controllers\Front\ProjectController::class, 'index'])->name('front.project.index');


Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'auth'], function () {
        // Dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');
        // Permissions
        Route::resource('/permission', App\Http\Controllers\Admin\PermissionController::class, ['except' => ['create', 'edit', 'update', 'delete'], 'as' => 'admin']);
        // Posts
        Route::resource('/post', App\Http\Controllers\Admin\PostController::class, ['except' => ['show'], 'as' => 'admin']);
        // Services
        Route::resource('/service', App\Http\Controllers\Admin\ServiceController::class, ['except' => ['show'], 'as' => 'admin']);
        // Projects
        Route::resource('/project', App\Http\Controllers\Admin\ProjectController::class, ['except' => ['show'], 'as' => 'admin']);
        // Categories
        Route::resource('/category', App\Http\Controllers\Admin\CategoryController::class, ['except' => ['show'], 'as' => 'admin']);
        // Team
        Route::resource('/team', App\Http\Controllers\Admin\TeamController::class, ['except' => ['show'], 'as' => 'admin']);
        // Slider
        Route::resource('/slider', App\Http\Controllers\Admin\SliderController::class, ['except' => ['show'], 'as' => 'admin']);
        // Testimonial
        Route::resource('/testimonial', App\Http\Controllers\Admin\TestimonialController::class, ['except' => ['show'], 'as' => 'admin']);
        // Fact
        Route::resource('/fact', App\Http\Controllers\Admin\FactController::class, ['except' => ['show'], 'as' => 'admin']);
        // User
        Route::resource('/user', App\Http\Controllers\Admin\UserController::class, ['except' => ['show'], 'as' => 'admin']);
        // Role
        Route::resource('/role', App\Http\Controllers\Admin\RoleController::class, ['except' => ['show'], 'as' => 'admin']);
    });
});


