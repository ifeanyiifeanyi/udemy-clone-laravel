<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Instructor\DashboardController as InstructorDashboardController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("dashboard",DashboardController::class)->name('dashboard');



Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function(){
    Route::controller(AdminDashboardController::class)->group(function(){
        Route::get('dashboard', 'index')->name('admin.dashboard');
        Route::post('logout', 'logout')->name('admin.logout');
    });

    Route::controller(AdminProfileController::class)->group(function(){
        Route::get('profile', 'index')->name('admin.profile');
        Route::put('profile/{user}', 'updateProfile')->name('admin.profile.update');
        Route::put('profile/password/{user}', 'updatePassword')->name('admin.profile.password.update');
    });

    Route::controller(AdminCategoryController::class)->group(function(){
        Route::get('categories', 'index')->name('admin.category');
        Route::post('categories/create', 'store')->name('admin.category.store');
        Route::get('categories/edit/{id}', 'edit')->name('admin.category.edit');
        Route::put('categories/update/{id}', 'update')->name('admin.category.update');
        Route::delete('categories/delete/{id}', 'destroy')->name('admin.category.destroy');
    });

    Route::controller(AdminSubCategoryController::class)->group(function(){
        Route::get('subcategories', 'index')->name('admin.subcategory');
        Route::post('subcategories/create', 'store')->name('admin.subcategory.store');
        Route::get('subcategories/edit/{id}', 'edit')->name('admin.subcategory.edit');
        Route::put('subcategories/update/{id}', 'update')->name('admin.subcategory.update');
        Route::delete('subcategories/delete/{id}', 'destroy')->name('admin.subcategory.destroy');
    });

});
















Route::middleware(['auth', 'verified', 'role:instructor'])->prefix('instructor')->group(function(){
    Route::controller(InstructorDashboardController::class)->group(function(){
        Route::get('dashboard', 'index')->name('instructor.dashboard');
    });
});

Route::middleware(['auth', 'verified', 'role:member'])->prefix('member')->group(function(){
    Route::controller(MemberDashboardController::class)->group(function(){
        Route::get('dashboard', 'index')->name('member.dashboard');
    });
});

require __DIR__.'/auth.php';
