<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\backend\ModuleController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ParametreController;
use App\Http\Controllers\backend\PortfolioController;
use App\Http\Controllers\backend\EntrepriseController;
use App\Http\Controllers\backend\PermissionController;



Route::fallback(function () {
    return view('backend.utility.auth-404-basic');
});

Route::middleware(['admin'])->prefix('admin')->group(function () {

    // login and logout
    Route::controller(AdminController::class)->group(function () {
        route::get('/login', 'login')->name('admin.login')->withoutMiddleware('admin'); // page formulaire de connexion
        route::post('/login', 'login')->name('admin.login')->withoutMiddleware('admin'); // envoi du formulaire
        route::post('/logout', 'logout')->name('admin.logout');
    });



    // dashboard admin
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // parametre application
    Route::prefix('parametre')->controller(ParametreController::class)->group(function () {
        route::get('', 'index')->name('parametre.index');
        route::post('store', 'store')->name('parametre.store');
        route::get('maintenance-up', 'maintenanceUp')->name('parametre.maintenance-up');
        route::get('maintenance-down', 'maintenanceDown')->name('parametre.maintenance-down');
        route::get('optimize-clear', 'optimizeClear')->name('parametre.optimize-clear');
        Route::get('download-backup/{file}', 'downloadBackup')->name('setting.download-backup');  // download backup db
    });


    //register admin
    Route::prefix('register')->controller(AdminController::class)->group(function () {
        route::get('', 'index')->name('admin-register.index');
        route::post('store', 'store')->name('admin-register.store');
        route::post('update/{id}', 'update')->name('admin-register.update');
        route::get('delete/{id}', 'delete')->name('admin-register.delete');
        route::get('profil/{id}', 'profil')->name('admin-register.profil');
        route::post('change-password', 'changePassword')->name('admin-register.new-password');
    });

    //role
    Route::prefix('role')->controller(RoleController::class)->group(function () {
        route::get('', 'index')->name('role.index');
        route::post('store', 'store')->name('role.store');
        route::post('update/{id}', 'update')->name('role.update');
        route::delete('delete/{id}', 'delete')->name('role.delete');
    });

    //permission
    Route::prefix('permission')->controller(PermissionController::class)->group(function () {
        route::get('', 'index')->name('permission.index');
        route::get('create', 'create')->name('permission.create');
        route::post('store', 'store')->name('permission.store');
        route::get('edit{id}', 'edit')->name('permission.edit');
        route::put('update/{id}', 'update')->name('permission.update');
        route::delete('delete/{id}', 'delete')->name('permission.delete');
    });

    //module
    Route::prefix('module')->controller(ModuleController::class)->group(function () {
        route::get('', 'index')->name('module.index');
        route::post('store', 'store')->name('module.store');
        route::post('update/{id}', 'update')->name('module.update');
        route::delete('delete/{id}', 'delete')->name('module.delete');
    });
    //entreprise
    Route::prefix('entreprise')->controller(EntrepriseController::class)->group(function () {
        route::get('', 'index')->name('entreprise.index');
        route::get('create', 'create')->name('entreprise.create');
        route::post('store', 'store')->name('entreprise.store');
        route::get('edit/{id}', 'edit')->name('entreprise.edit');
        route::put('update/{id}', 'update')->name('entreprise.update');
        route::delete('delete/{id}', 'delete')->name('entreprise.delete');
    });

    //service
    Route::prefix('services')->controller(ServiceController::class)->group(function () {
        route::get('', 'index')->name('service.index');
        route::get('create', 'create')->name('service.create');
        route::post('store', 'store')->name('service.store');
        route::get('show/{id}', 'show')->name('service.show');
        route::get('edit/{id}', 'edit')->name('service.edit');
        route::put('update/{id}', 'update')->name('service.update');
        route::delete('delete/{id}', 'delete')->name('service.delete');
    });
});

//portfolio 
Route::prefix('portfolio')->name('portfolios.')->controller(PortfolioController::class)->group(function () {
    route::get('', 'index')->name('index');
    route::get('create', 'create')->name('create');
    route::post('store', 'store')->name('store');
    route::get('show/{id}', 'show')->name('show');
    route::get('edit/{id}', 'edit')->name('edit');
    route::put('update/{id}', 'update')->name('update');
    route::delete('delete/{id}', 'delete')->name('delete');
    Route::get('portfolios/{portfolio}/media/{media}', 'deleteMedia')->name('media.delete');
});


//---------------------ROUTE FRONTEND-----------------------------------//
Route::controller(PageController::class)->group(function () {
    route::get('', 'accueil')->name('page.accueil');
    route::get('portfolios', 'portfolio')->name('page.portfolio');
    route::post('contact', 'contact')->name('page.contact');  // soumettre un formulaire de contact
    // candidature
    route::get('candidature', 'candidature')->name('page.candidature');
    route::post('candidature', 'candidatureStore')->name('page.candidature.store');
});


route::get('/welcome', function () {
    return view('web');
}); 

