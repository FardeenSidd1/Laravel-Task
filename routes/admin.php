<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\UserContactController;
use Illuminate\Support\Facades\Route;

    /***blog-post routes ****/
    Route::get('blog-posts', [BlogPostController::class, 'index'])->name('blog-posts.index');
    Route::post('blog-posts/list', [BlogPostController::class, 'getBlogPosts'])->name('blog-posts.list');
    Route::get('blog-posts/create', [BlogPostController::class, 'create'])->name('blog-posts.create');
    Route::get('blog-posts/edit/{id?}', [BlogPostController::class, 'create'])->name('blog-posts.edit');
    Route::post('blog-posts/store/{id?}', [BlogPostController::class, 'store'])->name('blog-posts.store');
    Route::delete('blog-posts/delete/{id}', [BlogPostController::class, 'destroy'])->name('blog-posts.delete');


    /***about us routes ***/
    Route::get('about-us', [AboutUsController::class, 'index'])->name('about.index');
    Route::post('about-us/list', [AboutUsController::class, 'getAboutUs'])->name('about.list');
    Route::get('about-us/create', [AboutUsController::class, 'create'])->name('about.create');
    Route::get('about-us/edit/{id?}', [AboutUsController::class, 'create'])->name('about.edit');
    Route::post('about-us/store/{id?}', [AboutUsController::class, 'store'])->name('about.store');
    Route::delete('about-us/delete/{id}', [AboutUsController::class, 'destroy'])->name('about.delete');



    Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact.index');
    Route::post('contact-us/list', [ContactUsController::class, 'getContacts'])->name('contact.list');
    Route::get('contact-us/create', [ContactUsController::class, 'create'])->name('contact.create');
    Route::get('contact-us/edit/{id?}', [ContactUsController::class, 'create'])->name('contact.edit');
    Route::post('contact-us/store/{id?}', [ContactUsController::class, 'store'])->name('contact.store');
    Route::delete('contact-us/delete/{id}', [ContactUsController::class, 'destroy'])->name('contact.delete');




Route::get('user-contacts', [UserContactController::class, 'index'])->name('user-contacts.index');
Route::post('user-contact/list', [UserContactController::class, 'getUserContacts'])->name('user-contacts.list');
Route::get('user-contact/create', [UserContactController::class, 'create'])->name('user-contacts.create');
Route::post('user-contact/store', [UserContactController::class, 'store'])->name('user-contacts.store');