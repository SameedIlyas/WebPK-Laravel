<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;


//User routes to all pages and admin login page
Route::get('/', [PageController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::post('/contact.submit', [ContactController::class, 'store'])->name('contact.submit');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/admin', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

//routes protected by authorization
Route::group(['middleware'=> AdminMiddleware::class], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/services', [ServiceController::class, 'adminIndex'])->name('admin.services');
    Route::post('/admin/services/add', [ServiceController::class, 'addService'])->name('admin.services.add');
    Route::delete('/admin/services/{id}/remove', [ServiceController::class, 'removeService'])->name('admin.services.remove');
    Route::get('/admin/services/{id}/edit', [ServiceController::class, 'editService'])->name('admin.services.edit');
    Route::post('/admin/services/{id}/update-inline', [ServiceController::class, 'updateServiceInline'])->name('admin.services.update.inline');
    Route::put('/admin/services/{id}/update', [ServiceController::class, 'updateService'])->name('admin.services.update');
    Route::get('/admin/courses', [CourseController::class, 'adminIndex'])->name('admin.courses');
    Route::post('/admin/courses/add', [CourseController::class, 'addCourse'])->name('admin.courses.add');
    Route::delete('/admin/courses/{id}/remove', [CourseController::class, 'removeCourse'])->name('admin.courses.remove');
    Route::post('/admin/courses/{id}/update-inline', [CourseController::class, 'updateCourseInline'])->name('admin.courses.updateInline');
    Route::post('/admin/courses/{id}/update', [CourseController::class, 'updateCourse'])->name('admin.courses.update');
});





