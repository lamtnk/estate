<?php

use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\ProjectImageController;
use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\admin\PropertyImageController;
use App\Http\Controllers\admin\PropertyRequestController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\NewController;
use App\Http\Controllers\client\ProjectController as ClientProjectController;
use App\Http\Controllers\client\PropertyController as ClientPropertyController;
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

Route::get('/', [HomeController::class, 'index'])->name('client.home.index');

Route::get('/login', [LoginController::class, 'index'])->name('login.view');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::prefix('/')->group(function () {

    // Route Tin tức
    Route::prefix('news')->group(function () {
        Route::get('/', [NewController::class, 'index'])->name('client.news.index');
        Route::get('/detail/{id}', [NewController::class, 'show'])->name('client.news.detail');
        Route::get('/search', [NewController::class, 'search'])->name('client.news.search');
        Route::get('/tag/{tag}', [NewController::class, 'filterByTag'])->name('client.news.filterByTag');
    });

    Route::prefix('property')->group(function () {
        Route::get('/', [ClientPropertyController::class, 'index'])->name('client.property.index');
        Route::get('/{id}', [ClientPropertyController::class, 'detail'])->name('client.property.detail');
        Route::post('/{id}', [ClientPropertyController::class, 'submitPropertyRequest'])->name('client.property.detail.submit');
    });

    Route::prefix('project')->group(function () {
        Route::get('/', [ClientProjectController::class, 'index'])->name('client.project.index');
        Route::get('/{id}', [ClientProjectController::class, 'detail'])->name('client.project.detail');
    });
});
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('indexAdmin');

    // Route Tin tức
    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('admin.news.index');
        Route::get('/add', [NewsController::class, 'showAddNew'])->name('admin.news.show_add');
        Route::post('/add', [NewsController::class, 'addNew'])->name('admin.news.add');
        Route::get('/edit', [NewsController::class, 'showEditNew'])->name('admin.news.show_edit');
        Route::put('/edit/{id}', [NewsController::class, 'editNew'])->name('admin.news.update');
        Route::get('/delete/{id}', [NewsController::class, 'deleteNew'])->name('admin.news.delete');
    });
    Route::prefix('project')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('admin.project.index');
        Route::get('/add', [ProjectController::class, 'add'])->name('admin.project.show_add');
        Route::post('/store', [ProjectController::class, 'store'])->name('admin.project.store');
        Route::get('edit/{id}', [ProjectController::class, 'edit'])->name('admin.project.edit');
        Route::put('edit/{id}', [ProjectController::class, 'update'])->name('admin.project.update');
        Route::post('/hide/{status}', [ProjectController::class, 'index'])->name('admin.project.hide');
        Route::get('/{projectId}/images', [ProjectImageController::class, 'index'])->name('admin.project.images.index');
        Route::post('/{projectId}/images/store', [ProjectImageController::class, 'store'])->name('admin.project.images.store');
        Route::get('/{projectId}/images/delete/{id}', [ProjectImageController::class, 'delete'])->name('admin.project.images.delete');
        Route::get('/{projectId}/images/deleteAll', [ProjectImageController::class, 'deleteAll'])->name('admin.project.images.deleteAll');
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

    Route::prefix('tag')->group(function () {
        Route::get('/', [TagController::class, 'index'])->name('admin.tag.index');
        Route::get('/add', [TagController::class, 'add'])->name('admin.tag.show_add');
        Route::post('/store', [TagController::class, 'store'])->name('admin.tag.store');
        Route::get('edit/{id}', [TagController::class, 'edit'])->name('admin.tag.edit');
        Route::put('edit/{id}', [TagController::class, 'update'])->name('admin.tag.update');
        Route::post('destroy/{id}', [TagController::class, 'destroy'])->name('admin.tag.destroy');
        Route::post('restore/{id}', [TagController::class, 'restore'])->name('admin.tag.restore');
    });

    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('admin.contact.index');
    });

    Route::prefix('property-request')->group(function () {
        Route::get('/', [PropertyRequestController::class, 'index'])->name('admin.property-request.index');
        Route::get('/{id}/toggle-status', [PropertyRequestController::class, 'toggleStatus'])->name('admin.property-request.toggleStatus');
        Route::get('/{request_type}/mark-all-seen', [PropertyRequestController::class, 'markAllSeen'])->name('admin.property-request.markAllSeen');
    });
});

Route::prefix('client')->group(function () {});
