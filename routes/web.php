<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\FaqController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\backend\EquipeController;
use App\Http\Controllers\backend\ModuleController;
use App\Http\Controllers\backend\ProjetController;
use App\Http\Controllers\backend\AproposController;
use App\Http\Controllers\backend\ActiviteController;
use App\Http\Controllers\backend\BanniereController;
use App\Http\Controllers\backend\ActualiteController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ParametreController;
use App\Http\Controllers\backend\PortfolioController;
use App\Http\Controllers\backend\EngagementController;
use App\Http\Controllers\backend\PermissionController;
use App\Http\Controllers\backend\StatistiqueController;



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

    //banniere
    Route::controller(BanniereController::class)->prefix('bannieres')->group(function () {
        route::get('', 'index')->name('bannieres.index');
        route::get('create', 'create')->name('bannieres.create');
        route::post('store', 'store')->name('bannieres.store');
        route::get('edit/{id}', 'edit')->name('bannieres.edit');
        route::put('update/{id}', 'update')->name('bannieres.update');
        route::delete('delete/{id}', 'destroy')->name('bannieres.delete');
    });

    //statistique
    Route::controller(StatistiqueController::class)->prefix('statistiques')->group(function () {
        route::get('', 'index')->name('statistiques.index');
        route::get('create', 'create')->name('statistiques.create');
        route::post('store', 'store')->name('statistiques.store');
        route::get('edit/{id}', 'edit')->name('statistiques.edit');
        route::put('update/{id}', 'update')->name('statistiques.update');
        route::delete('delete/{id}', 'destroy')->name('statistiques.delete');
    });

    //engagement
    Route::controller(EngagementController::class)->prefix('engagements')->group(function () {
        route::get('', 'index')->name('engagements.index');
        route::get('create', 'create')->name('engagements.create');
        route::post('store', 'store')->name('engagements.store');
        route::get('edit/{id}', 'edit')->name('engagements.edit');
        route::put('update/{id}', 'update')->name('engagements.update');
        route::delete('delete/{id}', 'destroy')->name('engagements.delete');
    });

    // apropos
    Route::controller(AproposController::class)->prefix('apropos')->group(function () {
        route::get('', 'index')->name('apropos.index');
        route::get('create', 'create')->name('apropos.create');
        route::post('store', 'store')->name('apropos.store');
        route::get('edit/{id}', 'edit')->name('apropos.edit');
        route::put('update/{id}', 'update')->name('apropos.update');
        route::delete('delete/{id}', 'destroy')->name('apropos.delete');
    });

    //equipes
    Route::controller(EquipeController::class)->prefix('equipes')->group(function () {
        route::get('', 'index')->name('equipes.index');
        route::get('create', 'create')->name('equipes.create');
        route::post('store', 'store')->name('equipes.store');
        route::get('edit/{id}', 'edit')->name('equipes.edit');
        route::put('update/{id}', 'update')->name('equipes.update');
        route::delete('delete/{id}', 'destroy')->name('equipes.delete');
    });


    //Activites
    Route::controller(ActiviteController::class)->prefix('activites')->group(function () {
        route::get('', 'index')->name('activites.index');
        route::get('create', 'create')->name('activites.create');
        route::post('store', 'store')->name('activites.store');
        route::get('edit/{id}', 'edit')->name('activites.edit');
        route::put('update/{id}', 'update')->name('activites.update');
        route::delete('delete/{id}', 'destroy')->name('activites.delete');
    });

    //projets
    Route::controller(ProjetController::class)->prefix('projets')->group(function () {
        route::get('', 'index')->name('projets.index');
        route::get('create', 'create')->name('projets.create');
        route::post('store', 'store')->name('projets.store');
        route::get('edit/{id}', 'edit')->name('projets.edit');
        route::put('update/{id}', 'update')->name('projets.update');
        route::delete('delete/{id}', 'destroy')->name('projets.delete');
    });

    //FAQ
    Route::controller(FaqController::class)->prefix('faqs')->group(function () {
        route::get('', 'index')->name('faqs.index');
        route::get('create', 'create')->name('faqs.create');
        route::post('store', 'store')->name('faqs.store');
        route::get('edit/{id}', 'edit')->name('faqs.edit');
        route::put('update/{id}', 'update')->name('faqs.update');
        route::delete('delete/{id}', 'destroy')->name('faqs.delete');
    });

    //portfolio
    Route::controller(PortfolioController::class)->prefix('portfolios')->group(function () {
        route::get('', 'index')->name('portfolios.index');
        route::get('create', 'create')->name('portfolios.create');
        route::post('store', 'store')->name('portfolios.store');
        route::get('edit/{id}', 'edit')->name('portfolios.edit');
        route::put('update/{id}', 'update')->name('portfolios.update');
        route::delete('delete/{id}', 'destroy')->name('portfolios.delete');
    });

    //actualites
    Route::controller(ActualiteController::class)->prefix('actualites')->group(function () {
        route::get('', 'index')->name('actualites.index');
        route::get('create', 'create')->name('actualites.create');
        route::post('store', 'store')->name('actualites.store');
        route::get('edit/{id}', 'edit')->name('actualites.edit');
        route::put('update/{id}', 'update')->name('actualites.update');
        route::delete('delete/{id}', 'destroy')->name('actualites.delete');
    });
});



//---------------------ROUTE FRONTEND-----------------------------------//
Route::controller(PageController::class)->group(function () {
    route::get('', 'accueil')->name('page.accueil');
    route::get('apropos', 'apropos')->name('page.apropos');
    route::get('activite/{slug}', 'activites')->name('page.activites');
    // Remplacez votre route actuelle par :
    Route::get('/portfolio', [PageController::class, 'portfolios'])->name('page.portfolios');

    // Supprimez cette route si elle existe :
    // Route::get('/portfolio/{categorie}', [PageController::class, 'portfolios'])->name('page.portfolios');

    // Optionnel : Route pour AJAX
    Route::get('/portfolio/ajax', [PageController::class, 'portfoliosAjax'])->name('page.portfolios.ajax');
});


route::get('/welcome', function () {
    return view('web');
});
