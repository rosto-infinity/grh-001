<?php

use App\Http\Controllers\EmploisController;
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
    Route::get('admin/emplois', [EmploisController::class, 'index'])->name('admin.emplois'); // 12-List all emplois
    Route::get('admin/emplois/filter', [EmploisController::class, 'filter'])->name('admin.emplois.filter'); // 13-Filter emplois
    Route::get('admin/emplois/add', [EmploisController::class, 'add'])->name('admin.emplois.add');// 14-Add new emploi
    Route::post('admin/emplois/add', [EmploisController::class, 'store'])->name('admin.emplois.store');// 15-Store new emploi
    Route::get('admin/emplois/view/{id}', [EmploisController::class, 'view'])->name('admin.emplois.view');// 16-View emploi details
    Route::get('admin/emplois/edit/{id}', [EmploisController::class, 'edit'])->name('admin.emplois.edit');// 17-Edit emploi
    Route::patch('admin/emplois/update/{id}', [EmploisController::class, 'update'])->name('admin.emplois.update');// 18-Update emploi
    Route::delete('admin/emplois/delete/{id}', [EmploisController::class, 'destroy'])->name('admin.emplois.destroy');// 019-Delete emploi
});
 
require __DIR__.'/auth.php';
 
//Route::get('admin/dashboard', [HomeController::class, 'index']);
//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);