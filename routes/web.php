<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\FrontendController;
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

Route::controller(FrontendController::class)->group(function() {
    Route::get('/', 'home')->name('frontend.home');
    Route::get('/about-us/{type}', 'aboutUs')->name('frontend.about.us');
    Route::get('/administrations/{type}', 'administrations')->name('frontend.administrations');
    Route::get('/academics/{type}', 'academics')->name('frontend.academics');
    Route::get('/admission/{type}', 'admission')->name('frontend.admission');
    Route::get('/facilities/{type}', 'facilities')->name('frontend.facilities');
    Route::get('/gallery/{type}', 'gallery')->name('frontend.gallery');
    Route::get('/notice', 'notice')->name('frontend.notice');
    Route::get('/contact', 'contact')->name('frontend.contact');
    Route::get('/acheivements', 'acheivements')->name('frontend.acheivements');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'loginForm')->name('login.form');
    Route::post('login', 'login')->name('login');
    Route::post('logout', 'logout')->name('logout');
});

Route::group(['prefix' => 'admin', 'middleware' => 'checkAdmin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');

    Route::group(['prefix' => '/setting'], function () {
        Route::get('/general', [SettingController::class, 'general'])->name('admin.setting.general');
        Route::get('/static-content', [SettingController::class, 'staticContent'])->name('admin.setting.static.content');
        Route::get('/legal-content', [SettingController::class, 'legalContent'])->name('admin.setting.legal.content');
        Route::post('/update', [SettingController::class, 'update'])->name('admin.setting.update');
        Route::get('/change-language', [SettingController::class, 'changeLanguage'])->name('admin.setting.change.language');
    });

    Route::group(['prefix' => '/role'], function () {
        Route::get('/generate/right/{mdule_name}', [RoleController::class, 'generate'])->name('admin.role.right.generate');
        Route::get('/', [RoleController::class, 'index'])->name('admin.role');
        Route::get('/get/role/list', [RoleController::class, 'getRoleList']);
        Route::get('/create', [RoleController::class, 'create'])->name('admin.role.create');
        Route::post('/store', [RoleController::class, 'store'])->name('admin.role.store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
        Route::any('/update/{id}', [RoleController::class, 'update'])->name('admin.role.update');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('admin.role.delete');
        Route::get('/right', [RoleController::class, 'right'])->name('admin.role.right');
        Route::get('/get/right/list', [RoleController::class, 'getRightList']);
        Route::post('/right/store', [RoleController::class, 'rightStore'])->name('admin.role.right.store');
        Route::get('/right/edit/{id}', [RoleController::class, 'editRight'])->name('admin.role.right.edit');
        Route::any('/right/update/{id}', [RoleController::class, 'roleRightUpdate'])->name('admin.role.right.update');
        Route::get('/right/delete/{id}', [RoleController::class, 'rightDelete'])->name('admin.role.right.delete');
    });

    Route::group(['prefix' => '/user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user');
        Route::get('/get/list', [UserController::class, 'getList']);
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::any('/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::post('/change', [UserController::class, 'changePassword'])->name('admin.user.changepassword');
    });

    Route::group(['prefix' => '/event'], function () {
        Route::controller(EventController::class)->group(function () {
            Route::get('/', 'index')->name('admin.event');
            Route::get('/get/list', 'getList');
            Route::post('/store', 'store')->name('admin.event.store');
            Route::get('/edit', 'edit')->name('admin.event.edit');
            Route::post('/update', 'update')->name('admin.event.update');
            Route::get('/delete', 'delete')->name('admin.event.delete');
        });
    });

    Route::group(['prefix' => '/menu'], function () {
        Route::controller(MenuController::class)->group(function () {
            Route::get('/', 'index')->name('admin.menu');
            Route::get('/get/list', 'getList');
            Route::post('/store', 'store')->name('admin.menu.store');
            Route::get('/edit', 'edit')->name('admin.menu.edit');
            Route::post('/update', 'update')->name('admin.menu.update');
            Route::get('/delete', 'delete')->name('admin.menu.delete');
        });
    });
});