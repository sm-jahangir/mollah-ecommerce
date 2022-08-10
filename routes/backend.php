<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdsController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\MenuBuilderController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

//Profile Routes
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
//Change Password Routes
Route::get('profile/changepassword', [ProfileController::class, 'changepass'])->name('profile.changepassindex');
Route::post('profile/changepassword', [ProfileController::class, 'changepassword'])->name('profile.changepassword');
Route::resource('pages', PageController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');
//MenuController
Route::resource('menus', MenuController::class)->except(['show']);
Route::group(['as' => 'menus.', 'prefix' => 'menus/{id}/'], function () {
    Route::get('builder', [MenuBuilderController::class, 'index'])->name('builder');
    Route::post('order', [MenuBuilderController::class, 'order'])->name('order');
    // Menu Item
    Route::group(['as' => 'item.', 'prefix' => 'item'], function () {
        Route::get('/create', [MenuBuilderController::class, 'itemCreate'])->name('create');
        Route::post('/store', [MenuBuilderController::class, 'itemStore'])->name('store');
        Route::get('/{itemId}/edit', [MenuBuilderController::class, 'itemEdit'])->name('edit');
        Route::put('/{itemId}/update', [MenuBuilderController::class, 'itemUpdate'])->name('update');
        Route::delete('/{itemId}/destroy', [MenuBuilderController::class, 'itemDestroy'])->name('destroy');
    });
});
// Settings

Route::group(['as' => 'settings.', 'prefix' => 'settings'], function () {
    Route::get('general', [SettingController::class, 'general'])->name('general');
    Route::patch('general', [SettingController::class, 'update'])->name('update');

    //Appearance
    Route::get('appearance', [SettingController::class, 'appearance'])->name('appearance.index');
    Route::patch('appearance', [SettingController::class, 'updateAppearance'])->name('appearance.update');

    //Mail Settings
    Route::get('mail', [SettingController::class, 'mail'])->name('mail.index');
    Route::patch('mail', [SettingController::class, 'updateMailSettings'])->name('mail.update');

    //Socialite Settings
    Route::get('socialite', [SettingController::class, 'socialite'])->name('socialite.index');
    Route::patch('socialite', [SettingController::class, 'updatesocialiteSettings'])->name('socialite.update');
});


// Category
Route::resource('category', CategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('brand', BrandController::class);
Route::resource('ads', AdsController::class);
Route::resource('size', SizeController::class);
Route::resource('color', ColorController::class);
Route::resource('product', ProductController::class);
