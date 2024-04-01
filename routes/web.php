<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\BlogController;
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [LoginController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [LoginController::class, 'login'])->name('login');







Route::group(['prefix' => '/admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    include('admin.php');
});

Route::get('aboutus',[BlogController::class, 'aboutUs'])->name('frontend.aboutus');

Route::get('authours',[BlogController::class,'authour'])->name('frontend.authours');


Route::get('blog-post-details',[BlogController::class,'blogDetails'])->name('frontend.blogDetails');

Route::get('blog-post',[BlogController::class,'blog'])->name('frontend.blog');
   
Route::get('contactus',[BlogController::class,'contactUs'])->name('frontend.contactus');

Route::get('index',[BlogController::class, 'index'])->name('frontend.index');
   

