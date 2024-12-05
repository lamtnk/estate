<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\ProjectController;
use App\Models\News;
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

    // Route Tin tức
    Route::prefix('news')->group(function (){
        Route::get('/', [NewsController::class, 'index'])->name('admin.news.index');
        Route::get('/add', [NewsController::class, 'showAddNew'])->name('admin.news.show_add');
        Route::post('/add', [NewsController::class, 'addNew'])->name('admin.news.add');
        Route::get('/edit', [NewsController::class, 'showEditNew'])->name('admin.news.show_edit');
        Route::put('/edit/{id}', [NewsController::class, 'editNew'])->name('admin.news.edit');
        Route::get('/delete/{id}', [NewsController::class, 'deleteNew'])->name('admin.news.delete');
    });
    Route::prefix('project')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('admin.project.index');
        Route::get('/add', [ProjectController::class, 'add'])->name('admin.project.show_add');
        Route::post('/store', [ProjectController::class, 'store'])->name('admin.project.store');
        Route::get('admin/project/{id}/edit', [ProjectController::class, 'edit'])->name('admin.project.edit');
        Route::put('admin/project/{id}', [ProjectController::class, 'update'])->name('admin.project.update');
        Route::post('/hide/{status}', [ProjectController::class, 'index'])->name('admin.project.hide');
    });
});
