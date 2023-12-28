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
use App\Http\Controllers\Backend\Gallery\GalleryeventController;
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
                Route::get('/get/list', 'getList')->name('admin.home.statistics.get.list');
                Route::post('/store', 'store')->name('admin.home.statistics.store');
                Route::get('/edit', 'edit')->name('admin.home.statistics.edit');
                Route::post('/update', 'update')->name('admin.home.statistics.update');
                Route::get('/delete', 'delete')->name('admin.home.statistics.delete');
            });
        });
    });

    Route::group(['prefix' => '/about-us'], function () {
        Route::group(['prefix' => '/glance'], function () {
            Route::controller(GlanceController::class)->group(function () {
                Route::get('/', 'index')->name('admin.about.us.glance');
                Route::get('/get/list', 'getList')->name('admin.about.us.glance.get.list');
                Route::post('/store', 'store')->name('admin.about.us.glance.store');
                Route::get('/edit', 'edit')->name('admin.about.us.glance.edit');
                Route::post('/update', 'update')->name('admin.about.us.glance.update');
                Route::get('/delete', 'delete')->name('admin.about.us.glance.delete');
            });
        });

        Route::group(['prefix' => '/history'], function () {
            Route::controller(HistoryController::class)->group(function () {
                Route::get('/', 'index')->name('admin.about.us.history');
                Route::get('/get/list', 'getList')->name('admin.about.us.history.get.list');
                Route::post('/store', 'store')->name('admin.about.us.history.store');
                Route::get('/edit', 'edit')->name('admin.about.us.history.edit');
                Route::post('/update', 'update')->name('admin.about.us.history.update');
                Route::get('/delete', 'delete')->name('admin.about.us.history.delete');
            });
        });

        Route::group(['prefix' => '/why'], function () {
            Route::controller(WhyController::class)->group(function () {
                Route::get('/', 'index')->name('admin.about.us.why');
                Route::get('/get/list', 'getList')->name('admin.about.us.why.get.list');
                Route::post('/store', 'store')->name('admin.about.us.why.store');
                Route::get('/edit', 'edit')->name('admin.about.us.why.edit');
                Route::post('/update', 'update')->name('admin.about.us.why.update');
                Route::get('/delete', 'delete')->name('admin.about.us.why.delete');
            });
        });
    });

    Route::group(['prefix' => '/administrations'], function () {
        Route::group(['prefix' => '/governing-body'], function () {
            Route::controller(GoverningbodyController::class)->group(function () {
                Route::get('/', 'index')->name('admin.administrations.governing.body');
                Route::get('/get/list', 'getList')->name('admin.administrations.governing.body.get.list');
                Route::post('/store', 'store')->name('admin.administrations.governing.body.store');
                Route::get('/edit', 'edit')->name('admin.administrations.governing.body.edit');
                Route::post('/update', 'update')->name('admin.administrations.governing.body.update');
                Route::get('/delete', 'delete')->name('admin.administrations.governing.body.delete');
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
                Route::get('/get/list', 'getList')->name('admin.administrations.teaching.staff.get.list');
                Route::post('/store', 'store')->name('admin.administrations.teaching.staff.store');
                Route::get('/edit', 'edit')->name('admin.administrations.teaching.staff.edit');
                Route::post('/update', 'update')->name('admin.administrations.teaching.staff.update');
                Route::get('/delete', 'delete')->name('admin.administrations.teaching.staff.delete');
            });
        });
    });

    Route::group(['prefix' => '/academics'], function () {
        Route::group(['prefix' => '/results'], function () {
            Route::controller(ResultController::class)->group(function () {
                Route::get('/', 'index')->name('admin.academics.results');
                Route::get('/get/list', 'getList')->name('admin.academics.results.get.list');
                Route::post('/store', 'store')->name('admin.academics.results.store');
                Route::get('/edit', 'edit')->name('admin.academics.results.edit');
                Route::post('/update', 'update')->name('admin.academics.results.update');
                Route::get('/delete', 'delete')->name('admin.academics.results.delete');
            });
        });

        Route::group(['prefix' => '/rules'], function () {
            Route::controller(RuleController::class)->group(function () {
                Route::get('/', 'index')->name('admin.academics.rules');
                Route::get('/get/list', 'getList')->name('admin.academics.rules.get.list');
                Route::post('/store', 'store')->name('admin.academics.rules.store');
                Route::get('/edit', 'edit')->name('admin.academics.rules.edit');
                Route::post('/update', 'update')->name('admin.academics.rules.update');
                Route::get('/delete', 'delete')->name('admin.academics.rules.delete');
            });
        });

        Route::group(['prefix' => '/dress'], function () {
            Route::controller(DressController::class)->group(function () {
                Route::get('/', 'index')->name('admin.academics.dress');
                Route::get('/get/list', 'getList')->name('admin.academics.dress.get.list');
                Route::post('/store', 'store')->name('admin.academics.dress.store');
                Route::get('/edit', 'edit')->name('admin.academics.dress.edit');
                Route::post('/update', 'update')->name('admin.academics.dress.update');
                Route::get('/delete', 'delete')->name('admin.academics.dress.delete');
            });
        });
    });

    Route::group(['prefix' => '/admission'], function () {
        Route::group(['prefix' => '/info'], function () {
            Route::controller(InfoController::class)->group(function () {
                Route::get('/', 'index')->name('admin.admission.info');
                Route::get('/get/list', 'getList')->name('admin.admission.info.get.list');
                Route::post('/store', 'store')->name('admin.admission.info.store');
                Route::get('/edit', 'edit')->name('admin.admission.info.edit');
                Route::post('/update', 'update')->name('admin.admission.info.update');
                Route::get('/delete', 'delete')->name('admin.admission.info.delete');
            });
        });
    });

    Route::group(['prefix' => '/gallery'], function () {
        Route::group(['prefix' => '/event'], function () {
            Route::controller(GalleryeventController::class)->group(function () {
                Route::get('/', 'index')->name('admin.gallery.event');
                Route::get('/get/list', 'getList')->name('admin.gallery.event.get.list');
                Route::post('/store', 'store')->name('admin.gallery.event.store');
                Route::get('/edit', 'edit')->name('admin.gallery.event.edit');
                Route::post('/update', 'update')->name('admin.gallery.event.update');
                Route::get('/delete', 'delete')->name('admin.gallery.event.delete');
            });
        });

        Route::group(['prefix' => '/photo'], function () {
            Route::controller(PhotoController::class)->group(function () {
                Route::get('/', 'index')->name('admin.gallery.photo');
                Route::get('/get/list', 'getList')->name('admin.gallery.photo.get.list');
                Route::post('/store', 'store')->name('admin.gallery.photo.store');
                Route::get('/edit', 'edit')->name('admin.gallery.photo.edit');
                Route::post('/update', 'update')->name('admin.gallery.photo.update');
                Route::get('/delete', 'delete')->name('admin.gallery.photo.delete');
            });
        });

        Route::group(['prefix' => '/video'], function () {
            Route::controller(VideoController::class)->group(function () {
                Route::get('/', 'index')->name('admin.gallery.video');
                Route::get('/get/list', 'getList')->name('admin.gallery.video.get.list');
                Route::post('/store', 'store')->name('admin.gallery.video.store');
                Route::get('/edit', 'edit')->name('admin.gallery.video.edit');
                Route::post('/update', 'update')->name('admin.gallery.video.update');
                Route::get('/delete', 'delete')->name('admin.gallery.video.delete');
            });
        });
    });

    Route::group(['prefix' => '/facilities'], function () {
        Route::group(['prefix' => '/'], function () {
            Route::controller(ScienceController::class)->group(function () {
                Route::get('/', 'index')->name('admin.facilities');
                Route::get('/get/list', 'getList')->name('admin.facilities.science.get.list');
                Route::post('/store', 'store')->name('admin.facilities.science.store');
                Route::get('/edit', 'edit')->name('admin.facilities.science.edit');
                Route::post('/update', 'update')->name('admin.facilities.science.update');
                Route::get('/delete', 'delete')->name('admin.facilities.science.delete');
            });
        });
        
        Route::group(['prefix' => '/ict'], function () {
            Route::controller(IctController::class)->group(function () {
                Route::get('/', 'index')->name('admin.facilities.ict');
                Route::get('/get/list', 'getList')->name('admin.facilities.ict.get.list');
                Route::post('/store', 'store')->name('admin.facilities.ict.store');
                Route::get('/edit', 'edit')->name('admin.facilities.ict.edit');
                Route::post('/update', 'update')->name('admin.facilities.ict.update');
                Route::get('/delete', 'delete')->name('admin.facilities.ict.delete');
            });
        });
        
        Route::group(['prefix' => '/library'], function () {
            Route::controller(LibraryController::class)->group(function () {
                Route::get('/', 'index')->name('admin.facilities.library');
                Route::get('/get/list', 'getList')->name('admin.facilities.library.get.list');
                Route::post('/store', 'store')->name('admin.facilities.library.store');
                Route::get('/edit', 'edit')->name('admin.facilities.library.edit');
                Route::post('/update', 'update')->name('admin.facilities.library.update');
                Route::get('/delete', 'delete')->name('admin.facilities.library.delete');
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
            Route::get('/get/list', 'getList')->name('admin.notice.get.list');
            Route::post('/store', 'store')->name('admin.notice.store');
            Route::get('/edit', 'edit')->name('admin.notice.edit');
            Route::post('/update', 'update')->name('admin.notice.update');
            Route::get('/delete', 'delete')->name('admin.notice.delete');
        });
    });

    Route::group(['prefix' => '/contact'], function () {
        Route::controller(ContactController::class)->group(function () {
            Route::get('/', 'index')->name('admin.contact');
            Route::get('/get/list', 'getList')->name('admin.contact.get.list');
            Route::post('/store', 'store')->name('admin.contact.store');
            Route::get('/edit', 'edit')->name('admin.contact.edit');
            Route::post('/update', 'update')->name('admin.contact.update');
            Route::get('/delete', 'delete')->name('admin.contact.delete');
        });
    });
});