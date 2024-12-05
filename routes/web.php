<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\admin\PropertyImageController;
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

Route::get('/', function () {
    return view('client.home.index');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::prefix('project')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('admin.project.index');
        Route::get('/add', [ProjectController::class, 'add'])->name('admin.project.show_add');
        Route::post('/store', [ProjectController::class, 'store'])->name('admin.project.store');
        Route::get('admin/project/{id}/edit', [ProjectController::class, 'edit'])->name('admin.project.edit');
        Route::put('admin/project/{id}', [ProjectController::class, 'update'])->name('admin.project.update');
        Route::post('/hide/{status}', [ProjectController::class, 'index'])->name('admin.project.hide');
    });

    Route::prefix('property')->group(function () {
        Route::get('/', [PropertyController::class, 'index'])->name('admin.property.index');
        Route::get('/add', [PropertyController::class, 'add'])->name('admin.property.show_add');
        Route::post('/store', [PropertyController::class, 'store'])->name('admin.property.store');
        Route::get('/{id}/edit', [PropertyController::class, 'edit'])->name('admin.property.edit');
        Route::put('/{id}/update', [PropertyController::class, 'update'])->name('admin.property.update');
        Route::get('/{id}/delete', [PropertyController::class, 'forceDelete'])->name('admin.property.delete');
        Route::get('/{propertyId}/images', [PropertyImageController::class, 'index'])->name('admin.property.images.index');
        Route::post('/{propertyId}/images/store', [PropertyImageController::class, 'store'])->name('admin.property.images.store');
        Route::get('/{propertyId}/images/delete/{id}', [PropertyImageController::class, 'delete'])->name('admin.property.images.delete');
        Route::get('/{propertyId}/images/deleteAll', [PropertyImageController::class, 'deleteAll'])->name('admin.property.images.deleteAll');
    });
});
