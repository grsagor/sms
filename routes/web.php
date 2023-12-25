<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\Aboutus\GlanceController;
use App\Http\Controllers\Backend\Aboutus\HistoryController;
use App\Http\Controllers\Backend\Aboutus\WhyController;
use App\Http\Controllers\Backend\Academics\DressController;
use App\Http\Controllers\Backend\Academics\ResultController;
use App\Http\Controllers\Backend\Academics\RuleController;
use App\Http\Controllers\Backend\Administrations\GoverningbodyController;
use App\Http\Controllers\Backend\Administrations\PrincipalController;
use App\Http\Controllers\Backend\Administrations\TeachingstaffController;
use App\Http\Controllers\Backend\Admission\InfoController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\Facilities\CommonroomController;
use App\Http\Controllers\Backend\Facilities\IctController;
use App\Http\Controllers\Backend\Facilities\LibraryController;
use App\Http\Controllers\Backend\Facilities\MultimediaController;
use App\Http\Controllers\Backend\Facilities\PrayerroomController;
use App\Http\Controllers\Backend\Facilities\ScienceController;
use App\Http\Controllers\Backend\Facilities\SmsController;
use App\Http\Controllers\Backend\Gallery\PhotoController;
use App\Http\Controllers\Backend\Gallery\VideoController;
use App\Http\Controllers\Backend\Home\BannerController;
use App\Http\Controllers\Backend\Home\IntroductionController;
use App\Http\Controllers\Backend\Home\StatisticsController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\NoticeController;
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
        Route::get('/update-setting-modal', [SettingController::class, 'updateSettingModal'])->name('admin.setting.update.modal');
        Route::post('/update-setting-modal-update', [SettingController::class, 'updateFromModal'])->name('admin.setting.update.from.modal');
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

    Route::group(['prefix' => '/home'], function () {
        Route::group(['prefix' => '/banner'], function () {
            Route::controller(BannerController::class)->group(function () {
                Route::get('/', 'index')->name('admin.home.banner');
                Route::get('/get', 'getList')->name('admin.home.banner.get.list');
                Route::post('/store', 'store')->name('admin.home.banner.store');
                Route::get('/edit', 'edit')->name('admin.home.banner.edit');
                Route::post('/update', 'update')->name('admin.home.banner.update');
                Route::get('/delete', 'delete')->name('admin.home.banner.delete');
            });
        });
        
        Route::group(['prefix' => '/introduction'], function () {
            Route::controller(IntroductionController::class)->group(function () {
                Route::get('/', 'index')->name('admin.home.introduction');
                Route::get('/get/list', 'getList')->name('admin.home.introduction.get.list');
                Route::post('/store', 'store')->name('admin.home.introduction.store');
                Route::get('/edit', 'edit')->name('admin.home.introduction.edit');
                Route::post('/update', 'update')->name('admin.home.introduction.update');
                Route::get('/delete', 'delete')->name('admin.home.introduction.delete');
            });
        });
        
        Route::group(['prefix' => '/statistics'], function () {
            Route::controller(StatisticsController::class)->group(function () {
                Route::get('/', 'index')->name('admin.home.statistics');
            });
        });
    });

    Route::group(['prefix' => '/about-us'], function () {
        Route::group(['prefix' => '/glance'], function () {
            Route::controller(GlanceController::class)->group(function () {
                Route::get('/', 'index')->name('admin.about.us.glance');
            });
        });

        Route::group(['prefix' => '/history'], function () {
            Route::controller(HistoryController::class)->group(function () {
                Route::get('/', 'index')->name('admin.about.us.history');
            });
        });

        Route::group(['prefix' => '/why'], function () {
            Route::controller(WhyController::class)->group(function () {
                Route::get('/', 'index')->name('admin.about.us.why');
            });
        });
    });

    Route::group(['prefix' => '/administrations'], function () {
        Route::group(['prefix' => '/governing-body'], function () {
            Route::controller(GoverningbodyController::class)->group(function () {
                Route::get('/', 'index')->name('admin.administrations.governing.body');
            });
        });

        Route::group(['prefix' => '/principal'], function () {
            Route::controller(PrincipalController::class)->group(function () {
                Route::get('/', 'index')->name('admin.administrations.principal.message');
            });
        });

        Route::group(['prefix' => '/teaching-staff'], function () {
            Route::controller(TeachingstaffController::class)->group(function () {
                Route::get('/', 'index')->name('admin.administrations.teaching.staff');
            });
        });
    });

    Route::group(['prefix' => '/academics'], function () {
        Route::group(['prefix' => '/results'], function () {
            Route::controller(ResultController::class)->group(function () {
                Route::get('/', 'index')->name('admin.academics.results');
            });
        });

        Route::group(['prefix' => '/rules'], function () {
            Route::controller(RuleController::class)->group(function () {
                Route::get('/', 'index')->name('admin.academics.rules');
            });
        });

        Route::group(['prefix' => '/dress'], function () {
            Route::controller(DressController::class)->group(function () {
                Route::get('/', 'index')->name('admin.academics.dress');
            });
        });
    });

    Route::group(['prefix' => '/admission'], function () {
        Route::group(['prefix' => '/info'], function () {
            Route::controller(InfoController::class)->group(function () {
                Route::get('/', 'index')->name('admin.admission.info');
            });
        });
    });

    Route::group(['prefix' => '/gallery'], function () {
        Route::group(['prefix' => '/photo'], function () {
            Route::controller(PhotoController::class)->group(function () {
                Route::get('/', 'index')->name('admin.gallery.photo');
            });
        });

        Route::group(['prefix' => '/video'], function () {
            Route::controller(VideoController::class)->group(function () {
                Route::get('/', 'index')->name('admin.gallery.video');
            });
        });
    });

    Route::group(['prefix' => '/facilities'], function () {
        Route::group(['prefix' => '/science'], function () {
            Route::controller(ScienceController::class)->group(function () {
                Route::get('/', 'index')->name('admin.facilities.science');
            });
        });
        
        Route::group(['prefix' => '/ict'], function () {
            Route::controller(IctController::class)->group(function () {
                Route::get('/', 'index')->name('admin.facilities.ict');
            });
        });
        
        Route::group(['prefix' => '/library'], function () {
            Route::controller(LibraryController::class)->group(function () {
                Route::get('/', 'index')->name('admin.facilities.library');
            });
        });

        Route::group(['prefix' => '/multimedia'], function () {
            Route::controller(MultimediaController::class)->group(function () {
                Route::get('/', 'index')->name('admin.facilities.multimedia');
            });
        });
        
        Route::group(['prefix' => '/sms'], function () {
            Route::controller(SmsController::class)->group(function () {
                Route::get('/', 'index')->name('admin.facilities.sms');
            });
        });

        Route::group(['prefix' => '/commonroom'], function () {
            Route::controller(CommonroomController::class)->group(function () {
                Route::get('/', 'index')->name('admin.facilities.commonroom');
            });
        });

        Route::group(['prefix' => '/prayerroom'], function () {
            Route::controller(PrayerroomController::class)->group(function () {
                Route::get('/', 'index')->name('admin.facilities.prayerroom');
            });
        });
    });

    Route::group(['prefix' => '/notice'], function () {
        Route::controller(NoticeController::class)->group(function () {
            Route::get('/', 'index')->name('admin.notice');
        });
    });

    Route::group(['prefix' => '/contact'], function () {
        Route::controller(ContactController::class)->group(function () {
            Route::get('/', 'index')->name('admin.contact');
        });
    });
});