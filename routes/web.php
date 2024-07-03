<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('show_officers', [AdminController::class, 'showOfficers'])->name('show.officers');
    Route::get('show_eval', [AdminController::class, 'showEval'])->name('show.eval');
    Route::get('add_units', [AdminController::class, 'addUnits'])->name('add.units');
    Route::get('deploy_units', [AdminController::class, 'deployUnits'])->name('deploy.units');
    Route::put('eval_update/{id}',[AdminController::class, 'updateEval'])->name('updateEval');
    Route::get('add_unit', [AdminController::class, 'addUnit'])->name('add.unit');
    Route::post('store_units', [AdminController::class, 'storeUnit'])->name('store.units');
    Route::get('add_officers', [AdminController::class, 'addOfficers'])->name('add.officers');
    Route::put('assign_unit/{id}', [AdminController::class, 'assignUnit'])->name('admin.assignUnit');
    // Route::put('deploy_units', [AdminController::class, 'deployUnits'])->name('admin.deployUnits');
    Route::post('deploy_unit', [AdminController::class, 'deployUnit'])->name('deploy.unit');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('show_deployments/{id}', [UserController::class, 'showDeployments'])->name('show.deployments');
    // Route::get('show_eval', [UserController::class, 'showEval'])->name('show.eval');
});