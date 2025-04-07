<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\JobsController;

// use App\Http\Controllers\EmployeesController;
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
 * * 1-Admin Routes
 */
Route::middleware(['auth', 'admin'])->group(function () {
 
    // 2-Employee Routes
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');// 03-Dashboard
    Route::get('admin/employees', [EmployeesController::class, 'index'])->name('admin.employees');// 4-List all employees
    Route::get('admin/employees/add', [EmployeesController::class, 'add'])->name('admin.employees.add'); //5-Add new employee  
    Route::post('admin/employees/add', [EmployeesController::class, 'store'])->name('admin.employees.store'); // 6-Store new employee
    Route::get('admin/employees/view/{id}', [EmployeesController::class, 'view'])->name('admin.employees.view'); // 7-View employee details
    Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'edit'])->name('admin.employees.edit'); // 8-Edit employee
    Route::patch('admin/employees/update/{id}', [EmployeesController::class, 'update'])->name('admin.employees.update'); //9- Update employee
    Route::delete('admin/employees/delete/{id}', [EmployeesController::class, 'destroy'])->name('admin.employees.destroy'); // 10-Delete employee
 
    //Job Routes
    Route::get('admin/jobs', [JobsController::class, 'index'])->name('admin.jobs'); // 11-List all jobs
    Route::get('admin/jobs/filter', [JobsController::class, 'filter'])->name('admin.jobs.filter'); // 12-Filter jobs
    Route::get('admin/jobs/add', [JobsController::class, 'add'])->name('admin.jobs.add');// 13-Add new job
    Route::post('admin/jobs/add', [JobsController::class, 'store'])->name('admin.jobs.store');// 14-Store new job
    Route::get('admin/jobs/view/{id}', [JobsController::class, 'view'])->name('admin.jobs.view');// View job details
    Route::get('admin/jobs/edit/{id}', [JobsController::class, 'edit'])->name('admin.jobs.edit');// Edit job
    Route::patch('admin/jobs/update/{id}', [JobsController::class, 'update'])->name('admin.jobs.update');// Update job
    Route::delete('admin/jobs/delete/{id}', [JobsController::class, 'destroy'])->name('admin.jobs.destroy');// Delete job
});
 
require __DIR__.'/auth.php';
 
//Route::get('admin/dashboard', [HomeController::class, 'index']);
//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);