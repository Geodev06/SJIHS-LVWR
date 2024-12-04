<?php

use App\Http\Controllers\AdminDashbaordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentRecordController;
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

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/user-save', 'save');
    Route::post('/user-auth', 'auth');
    Route::post('/logout', 'logout');


    Route::get('/forbidden', 'forbidden')->name('forbidden');


});

Route::controller(AdminDashbaordController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('/admin-dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('/manage-student-record', 'manage_student_record')->name('admin.manage_student_record');
        Route::get('/manage-sections', 'manage_sections')->middleware('role')->name('admin.manage_sections');
        Route::get('/manage-schools', 'schools')->middleware('role')->name('admin.schools');
        Route::get('/manage-users', 'users')->middleware('role')->name('admin.users');

        Route::get('/student-form/{id?}/{action?}', 'student_form')->name('admin.student_form');
        Route::get('/section-form/{id?}/{action?}', 'section_form')->name('admin.section_form');
        Route::get('/encode-school/{id?}/{action?}', 'school_form')->name('admin.school_form');
        Route::get('/user-form/{id?}/{action?}', 'user_form')->name('admin.user_form');



    });


