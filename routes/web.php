<?php


use App\Http\Middleware\checkUserType;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DeanController;

Route::get('/', function () {
    return view('auth.login');
});

// admin routes
Route::middleware(['auth', 'checkUserType:admin'])->group(function () {
    Route::get('admin/dashboard', function () {  return view('admin.dashboard'); })->name('admin.dashboard');
    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('admin_profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('admin_profile.update');
    Route::delete('admin/profile', [ProfileController::class, 'destroy'])->name('admin_profile.destroy');
    Route::resource('program', ProgramController::class)->names([
        'index' => 'program.index',
        'create' => 'program.create',
        'store' => 'program.store',
        'edit' => 'program.edit',
        'update' => 'program.update'
    ]);
    Route::resource('department', DepartmentController::class)->names([
        'index' => 'department.index',
        'create' => 'department.create',
        'store' => 'department.store',
        'edit' => 'department.edit',
        'update' => 'department.update'
    ]);
    Route::resource('dean', DeanController::class)->names([
        'index' => 'dean.index',
        'create' => 'dean.create',
        'store' => 'dean.store',
        'edit' => 'dean.edit',
        'update' => 'dean.update'
    ]);
    
});

//instructor routes
Route::middleware(['auth', 'checkUserType:instructor'])->group(function () {
    Route::get('instructor/dashboard', function () {  return view('instructor.dashboard'); })->name('instructor.dashboard');
    Route::get('instructor/profile', [ProfileController::class, 'edit'])->name('instructor_profile.edit');
    Route::patch('instructor/profile', [ProfileController::class, 'update'])->name('instructor_profile.update');
    Route::delete('instructor/profile', [ProfileController::class, 'destroy'])->name('instructor_profile.destroy');
});

require __DIR__.'/auth.php';
