<?php

use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;
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

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE, PATCH');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');

Route::group(['prefix' => 'administrator', 'namespace' => 'Admin'], function () {
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('admin-register');
    Route::get('/login', [App\Http\Controllers\Administrator\AdminAuthController::class, 'login'])->name('admin-login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('verify-login');
    Route::get('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showForgotPasswordForm'])->name('admin-password.request');
    Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'resetPassword'])->name('password.update');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [App\Http\Controllers\Administrator\IndexController::class, 'index'])->name('administrator');
        Route::get('/dashboard', [App\Http\Controllers\Administrator\IndexController::class, 'index'])->name('dashboard');
        Route::get('/profile', [App\Http\Controllers\Administrator\IndexController::class, 'profile'])->name('administrator-profile');
        Route::post('/update-profile', [App\Http\Controllers\Administrator\IndexController::class, 'saveProfile'])->name('administrator-update-profile');
        Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('administrator-logout');
        Route::get('/update-password/{id}', [App\Http\Controllers\Administrator\IndexController::class, 'updatePassword'])->name('administrator-update-password');
        
        //Page
        Route::get('/pages', [App\Http\Controllers\Administrator\PageController::class, 'index'])->name('admin-pages');
        Route::get('/add-page', [App\Http\Controllers\Administrator\PageController::class, 'Add'])->name('admin-add-page');
        Route::get('/view-page/{id}', [App\Http\Controllers\Administrator\PageController::class, 'show'])->name('admin-view-page');
        Route::post('/save-page', [App\Http\Controllers\Administrator\PageController::class, 'save'])->name('admin-save-page');
        Route::get('/delete-page/{id}', [App\Http\Controllers\Administrator\PageController::class, 'delete'])->name('admin-delete-page');

        //AdPage
        Route::get('/ad-pages', [App\Http\Controllers\Administrator\AdPageController::class, 'index'])->name('admin-ad-pages');
        Route::get('/add-ad-page', [App\Http\Controllers\Administrator\AdPageController::class, 'Add'])->name('admin-add-ad-page');
        Route::get('/view-ad-page/{id}', [App\Http\Controllers\Administrator\AdPageController::class, 'show'])->name('admin-ad-view-page');
        Route::post('/save-ad-page', [App\Http\Controllers\Administrator\AdPageController::class, 'save'])->name('admin-sad-ave-page');
        Route::get('/delete-ad-page/{id}', [App\Http\Controllers\Administrator\AdPageController::class, 'delete'])->name('admin-ad-delete-page');

        // Media 
        Route::get('/media', [App\Http\Controllers\Administrator\MediaController::class, 'index'])->name('admin-media');
        Route::get('/view-file/{id}', [App\Http\Controllers\Administrator\MediaController::class, 'view'])->name('admin-view-file');
        Route::post('/upload', [App\Http\Controllers\Administrator\MediaController::class, 'save'])->name('admin-save-media');
        Route::post('/save-file', [App\Http\Controllers\Administrator\MediaController::class, 'updateFile'])->name('admin-save-file');
        Route::get('/delete-file/{id}', [App\Http\Controllers\Administrator\MediaController::class, 'delete'])->name('admin-delete-job');
        Route::post('/search-media', [App\Http\Controllers\Administrator\MediaController::class, 'search'])->name('admin-search-media');

        //Blogs
        Route::get('/blogs', [App\Http\Controllers\Administrator\BlogController::class, 'index'])->name('admin-blogs');
        Route::get('/add-blog', [App\Http\Controllers\Administrator\BlogController::class, 'Add'])->name('admin-add-blog');
        Route::get('/view-blog/{id}', [App\Http\Controllers\Administrator\BlogController::class, 'show'])->name('admin-view-blog');
        Route::post('/save-blog', [App\Http\Controllers\Administrator\BlogController::class, 'save'])->name('admin-save-blog');
        Route::get('/delete-blog/{id}', [App\Http\Controllers\Administrator\BlogController::class, 'delete'])->name('admin-delete-blog');

        //Tags
        Route::get('/tags', [App\Http\Controllers\Administrator\TagController::class, 'index'])->name('admin-tags');
        Route::post('/get-tags', [App\Http\Controllers\Administrator\TagController::class, 'getTags'])->name('admin-get-tags');
        Route::get('/add-tag', [App\Http\Controllers\Administrator\TagController::class, 'add'])->name('admin-add-tag');
        Route::get('/view-tag/{id}', [App\Http\Controllers\Administrator\TagController::class, 'show'])->name('admin-view-tag');
        Route::post('/save-tag', [App\Http\Controllers\Administrator\TagController::class, 'save'])->name('admin-save-tag');
        Route::get('/delete-tag/{id}', [App\Http\Controllers\Administrator\TagController::class, 'delete'])->name('admin-delete-tag');
        
        //Review
        Route::get('/reviews', [App\Http\Controllers\Administrator\ReviewController::class, 'index'])->name('admin-reviews');
        Route::get('/view-review/{id}', [App\Http\Controllers\Administrator\ReviewController::class, 'show'])->name('admin-view-review');
        Route::post('/save-review', [App\Http\Controllers\Administrator\ReviewController::class, 'save'])->name('admin-save-review');

        //Contacts
        Route::get('/contacts', [App\Http\Controllers\Administrator\ContactController::class, 'index'])->name('admin-contacts');
        Route::get('/view-contact/{id}', [App\Http\Controllers\Administrator\ContactController::class, 'show'])->name('admin-view-contact');

        Route::get('/settings', [App\Http\Controllers\Administrator\SettingController::class, 'show'])->name('admin-settings');
        Route::get('/general-settings', [App\Http\Controllers\Administrator\SettingController::class, 'general'])->name('admin-general-settings');
        Route::post('/save-settings', [App\Http\Controllers\Administrator\SettingController::class, 'save'])->name('admin-save-settings');  
        Route::post('/save-env', [App\Http\Controllers\Administrator\SettingController::class, 'saveEnv'])->name('admin-save-env');   
        
        
    });
});

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
