<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('homeAdmin');

    Route::resource('category', CategoryController::class);
   
    Route::resource('post', PostController::class);

});



Route::get('/', function () {
    return view('templates.my_template.index');
});

Route::get('/about', function () {
    return view('templates.my_template.about');
});

Route::get('/contact', function () {
    return view('templates.my_template.contact');
});

Route::post('/contact-form', [ContactFormController::class, 'submit']);

Route::get('/coming-soon', function () {
    return view('templates.my_template.coming-soon');
});

Route::get('/faq', function () {
    return view('templates.my_template.faq');
});

Route::get('/four-column', function () {
    return view('templates.my_template.four-column');
});

Route::get('/infinite-scroll', function () {
    return view('templates.my_template.infinite-scroll');
});

Route::get('/load-more', function () {
    return view('templates.my_template.load-more');
});

Route::get('/one-column', function () {
    return view('templates.my_template.one-column');
});

Route::get('/services', function () {
    return view('templates.my_template.services');
});

Route::get('/single-post', function () {
    return view('templates.my_template.single-post');
});

Route::get('/six-column-full-wide', function () {
    return view('templates.my_template.six-column-full-wide');
});

Route::get('/teams', function () {
    return view('templates.my_template.teams');
});

Route::get('/testimonial', function () {
    return view('templates.my_template.testimonial');
});

Route::get('/three-colum-sidbar', function () {
    return view('templates.my_template.three-colum-sidbar');
});

Route::get('/three-column', function () {
    return view('templates.my_template.three-column');
});

Route::get('/two-column', function () {
    return view('templates.my_template.two-column');
});

