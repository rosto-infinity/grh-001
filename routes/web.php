<?php

use App\Http\Controllers\EmploiGradeController;
use App\Http\Controllers\EmploiHistoryController;
use App\Http\Controllers\EmploisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\RegionController;
use App\Models\EmploiHistory;

// -Route principale qui redirige vers la méthode 'home' du ProductController
Route::get('/', [ProductController::class, 'home'])->name('home');

// --Route pour le tableau de bord, accessible uniquement aux utilisateurs authentifiés et vérifiés
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --Routes protégées par authentification
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); //-- Éditer le profil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); //-- Mettre à jour le profil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // --Supprimer le profil
});

/**
 * 1 - --Routes Administrateur
 */
Route::middleware(['auth', 'admin'])->group(function () {
  
    // 2 - -Routes pour les Employés
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard'); // 03 - Tableau de bord administrateur
    Route::get('admin/employees', [EmployeesController::class, 'index'])->name('admin.employees'); // 04 - Lister tous les employés
    Route::get('admin/employees/excel', [EmployeesController::class, 'excel'])->name('admin.employees.excel'); // 05 - --Exporter les employés au format Excel
    Route::get('admin/employees/add', [EmployeesController::class, 'add'])->name('admin.employees.add'); // 06 - -Ajouter un nouvel employé  
    Route::post('admin/employees/add', [EmployeesController::class, 'store'])->name('admin.employees.store'); // 07 - -Enregistrer un nouvel employé
    Route::get('admin/employees/view/{id}', [EmployeesController::class, 'view'])->name('admin.employees.view'); // 08 -- Voir les détails d'un employé
    Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'edit'])->name('admin.employees.edit'); // 09 - -Éditer un employé
    Route::patch('admin/employees/update/{id}', [EmployeesController::class, 'update'])->name('admin.employees.update'); // 10 -- Mettre à jour un employé
    Route::delete('admin/employees/delete/{id}', [EmployeesController::class, 'destroy'])->name('admin.employees.destroy'); // 11 - -Supprimer un employé
  
    // --Routes pour les Emplois
    Route::get('admin/emplois', [EmploisController::class, 'index'])->name('admin.emplois'); // 12 - -Lister tous les emplois
    Route::get('admin/emplois/excel', [EmploisController::class, 'excel'])->name('admin.emplois.excel'); // 20 - -Exporter les emplois au format Excel
    Route::get('admin/emplois/filter', [EmploisController::class, 'filter'])->name('admin.emplois.filter'); // 13 - -Filtrer les emplois
    Route::get('admin/emplois/add', [EmploisController::class, 'add'])->name('admin.emplois.add'); // 14 -- Ajouter un nouvel emploi
    Route::post('admin/emplois/add', [EmploisController::class, 'store'])->name('admin.emplois.store'); // 15 -- Enregistrer un nouvel emploi
    Route::get('admin/emplois/view/{id}', [EmploisController::class, 'view'])->name('admin.emplois.view'); // 16 - -Voir les détails d'un emploi
    Route::get('admin/emplois/edit/{id}', [EmploisController::class, 'edit'])->name('admin.emplois.edit'); // 17 - --Éditer un emploi
    Route::patch('admin/emplois/update/{id}', [EmploisController::class, 'update'])->name('admin.emplois.update'); // 18 - --Mettre à jour un emploi
    Route::delete('admin/emplois/delete/{id}', [EmploisController::class, 'destroy'])->name('admin.emplois.destroy'); // 19 --- Supprimer un emploi
    // --Routes pour l'historique des emplois
    Route::get('admin/emplois_histories', [EmploiHistoryController::class, 'index'])->name('admin.emplois_histories'); // 21 - Lister tous les historiques d'emploi
    Route::get('admin/emplois_histories/excel', [EmploiHistoryController::class, 'excel'])->name('admin.emplois_histories.excel'); // 22 - ---Exporter les historiques d'emploi au format Excel
    Route::get('admin/emplois_histories/create', [EmploiHistoryController::class, 'create'])->name('admin.emplois_histories.create'); // 23 - Formulaire de création d'historique d'emploi
    Route::post('admin/emplois_histories/create', [EmploiHistoryController::class, 'store'])->name('admin.emplois_histories.store'); // 24 - Enregistrer un nouvel historique d'emploi
    Route::get('admin/emplois_histories/{id}', [EmploiHistoryController::class, 'show'])->name('admin.emplois_histories.show'); // 25 - Voir les détails d'un historique d'emploi
    Route::get('admin/emplois_histories/{id}/edit', [EmploiHistoryController::class, 'edit'])->name('admin.emplois_histories.edit'); // 26 - Éditer un historique d'emploi
    Route::patch('admin/emplois_histories/{id}', [EmploiHistoryController::class, 'update'])->name('admin.emplois_histories.update'); // 27 - Mettre à jour un historique d'emploi
    Route::delete('admin/emplois_histories/{id}', [EmploiHistoryController::class, 'destroy'])->name('admin.emplois_histories.destroy'); // 28 - Supprimer un historique d'emploi
    
    //emploi_grades
    Route::get('admin/emplois_grades', [EmploiGradeController::class, 'index'])->name('admin.emplois_grades'); // 21 - Lister tous les grades d'emploi
    Route::get('admin/emplois_grades/excel', [EmploiGradeController::class, 'excel'])->name('admin.emplois_grades.excel'); // 22 - --Exporter les grades d'emploi au format Excel
    Route::get('admin/emplois_grades/add', [EmploiGradeController::class, 'add'])->name('admin.emplois_grades.add'); // 23 - -Formulaire de création d'un grade d'emploi
    Route::post('admin/emplois_grades/add', [EmploiGradeController::class, 'store'])->name('admin.emplois_grades.store'); // 24 -- Enregistrer un nouveau grade d'emploi
    Route::get('admin/emplois_grades/{id}', [EmploiGradeController::class, 'view'])->name('admin.emplois_grades.view'); // 25 - -Voir les détails d'un grade d'emploi
    Route::get('admin/emplois_grades/{id}/edit', [EmploiGradeController::class, 'edit'])->name('admin.emplois_grades.edit'); // 26 - --Éditer un grade d'emploi
    Route::patch('admin/emplois_grades/{id}', [EmploiGradeController::class, 'update'])->name('admin.emplois_grades.update'); // 27 - ---Mettre à jour un grade d'emploi
    Route::delete('admin/emplois_grades/{id}', [EmploiGradeController::class, 'destroy'])->name('admin.emplois_grades.destroy'); // 28 - --Supprimer un grade d'emploi
    
    //Regions
    Route::get('admin/regions', [RegionController::class, 'index'])->name('admin.regions'); //  Lister tous les regions
    Route::get('admin/regions/excel', [RegionController::class, 'excel'])->name('admin.regions.excel'); // Exporter les regions au format Excel
    Route::get('admin/regions/add', [RegionController::class, 'add'])->name('admin.regions.add'); // Formulaire de création d'une regions
    Route::post('admin/regions/add', [RegionController::class, 'store'])->name('admin.regions.store'); // Enregistrer d'une nouveau regions
    Route::get('admin/regions/{id}', [RegionController::class, 'view'])->name('admin.regions.view'); // Voir les détails d'une regions
    Route::get('admin/regions/{id}/edit', [RegionController::class, 'edit'])->name('admin.regions.edit'); //Éditer d'une regions
    Route::patch('admin/regions/{id}', [RegionController::class, 'update'])->name('admin.regions.update'); // Mettre à jour d'une regions
    Route::delete('admin/regions/{id}', [RegionController::class, 'destroy'])->name('admin.regions.destroy'); // Supprimer d'une regions
});


require __DIR__.'/auth.php'; // Inclusion des routes d'authentification

// Routes commentées qui peuvent être utilisées ultérieurement
// Route::get('admin/dashboard', [HomeController::class, 'index']);
// Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
