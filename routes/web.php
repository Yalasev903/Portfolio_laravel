<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PublicPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ContactFormController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:admin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('homeAdmin');

    Route::resource('category', CategoryController::class);

    Route::resource('post', PostController::class);

});

Route::post('/contact-form', [ContactFormController::class, 'submit']);

Route::get('/cases_view', [PublicPostController::class, 'index'])->name('cases_view.index');
Route::get('/cases_view/{id}', [PublicPostController::class, 'show'])->name('cases_view.show');


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
    return view('templates.my_template.comming-soon');
});

Route::get('/faq', function () {
    return view('templates.my_template.faq');
});

Route::get('/four-column', function () {
    return redirect()->route('cases_view.index');
});

Route::get('/infinite-scroll', function () {
    return redirect()->route('cases_view.index');
});

Route::get('/load-more', function () {
    return redirect()->route('cases_view.index');
});

Route::get('/one-column', function () {
    return redirect()->route('cases_view.index');
});

Route::get('/services', function () {
    return view('templates.my_template.services');
});

Route::get('/single-post', function () {
    return view('templates.my_template.single-post');
});

Route::get('/six-column-full-wide', function () {
    return redirect()->route('cases_view.index');
});

Route::get('/teams', function () {
    return view('templates.my_template.teams');
});

Route::get('/testimonial', function () {
    return view('templates.my_template.testimonial');
});

Route::get('/three-colum-sidbar', function () {
    return redirect()->route('cases_view.index');
});

Route::get('/three-column', function () {
    return redirect()->route('cases_view.index');
});

Route::get('/two-column', function () {
    return redirect()->route('cases_view.index');
});
