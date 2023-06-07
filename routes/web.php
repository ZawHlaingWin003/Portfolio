<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\AdminUserController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\DownloadCvController;
use App\Http\Controllers\HomeController;

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

Route::get('/', HomeController::class);

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

// ========== Download CV ==========
Route::get('/download-cv', DownloadCvController::class)->name('download-cv');

// ========== Send Message ==========
Route::post('/contact', ContactController::class)->name('contact.send');

// ========== Admin Dashboard ==========
Route::get('/admin', function(){
    return view('dashboard.home');
})->name('admin')->middleware('auth');

Route::prefix('admin')->group(function(){

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function(){

        Route::resource('admin_users', AdminUserController::class);
        Route::resource('projects', ProjectController::class);

        Route::resource('blogs', BlogController::class)->except(['index', 'show']);
        Route::get('blogs/list', [BlogController::class, 'list'])->name('blogs.list');
        Route::get('blogs/check_slug', [BlogController::class, 'checkSlug'])->name('blogs.checkSlug');
    });

});


// ========== Test Error Pages ==========
Route::get('/testPage', function(){
    // return abort(403);
    return view('errors.500');
});

