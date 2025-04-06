<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeesController;
// use App\Http\Controllers\EmployeesController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ProductController::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * * Admin Routes
 */
Route::middleware(['auth', 'admin'])->group(function () {
 
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/employees', [EmployeesController::class, 'index'])->name('admin.employees');
    Route::get('admin/employees/add', [EmployeesController::class, 'add'])->name('admin.employees.add');
    Route::post('admin/employees/add', [EmployeesController::class, 'store'])->name('admin.employees.store');
    Route::get('admin/employees/view/{id}', [EmployeesController::class, 'view'])->name('admin.employees.view');
    Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'edit'])->name('admin.employees.edit');
    Route::put('admin/employees/update/{id}', [EmployeesController::class, 'update'])->name('admin.employees.update');
    Route::delete('admin/employees/delete/{id}', [EmployeesController::class, 'destroy'])->name('admin.employees.destroy');

   
 
    
});
 
require __DIR__.'/auth.php';
 
//Route::get('admin/dashboard', [HomeController::class, 'index']);
//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);