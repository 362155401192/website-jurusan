<?php

use App\Http\Controllers\Web\Frontend\Home\HomeController;
use App\Http\Controllers\Web\Frontend\Home\PublikasiController;

use App\Http\Controllers\Web\Backend\Achievement\AchievementController;
use App\Http\Controllers\Web\Backend\Achievement\AchievementLevelController;
use App\Http\Controllers\Web\Backend\Achievement\AchievementTypeController;
use App\Http\Controllers\Web\Backend\Achievement\AchievementProgramStudiController;
use App\Http\Controllers\Web\Backend\Cooperation\CooperationFieldController;
use App\Http\Controllers\Web\Backend\Cooperation\CooperationTypeController;
use App\Http\Controllers\Web\Backend\Cooperation\CooperationController;
use App\Http\Controllers\Web\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Web\Backend\Document\DocumentController;
use App\Http\Controllers\Web\Backend\Document\DocumentTypeController;
use App\Http\Controllers\Web\Backend\Employee\EmployeeController;
use App\Http\Controllers\Web\Backend\Employee\EmployeeTypeController;
use App\Http\Controllers\Web\Backend\Employee\EmployeeProgramStudiController;
use App\Http\Controllers\Web\Backend\Employee\EmployeeStatusController;
use App\Http\Controllers\Web\Backend\Event\EventController;
use App\Http\Controllers\Web\Backend\Page\PageController;
use App\Http\Controllers\Web\Backend\Menu\MenuController;
use App\Http\Controllers\Web\Backend\Partner\PartnerController;
use App\Http\Controllers\Web\Backend\Setting\SettingController;
use App\Http\Controllers\Web\Backend\User\PermissionController;
use App\Http\Controllers\Web\Backend\User\RoleController;
use App\Http\Controllers\Web\Backend\User\UserController;
use App\Http\Controllers\Web\Backend\Iku\SasaranKinerjaController;
use App\Http\Controllers\Web\Backend\Iku\IndikatorKinerjaKegiatanController;
use App\Http\Controllers\Web\Backend\Iku\TargetRealisasiController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/refresh-csrf', [HomeController::class, 'refreshCsrf'])->name('frontend.refresh_csrf');

// Front End Route
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');



// Jurusan Route
Route::get('/profil', [HomeController::class, 'profil'])->name('frontend.profil');
Route::get('/sejarah', [HomeController::class, 'sejarah'])->name('frontend.sejarah');
Route::get('/visi-dan-misi', [HomeController::class, 'visimisi'])->name('frontend.visimisi');
Route::get('/struktur-organisasi', [HomeController::class, 'organisasi'])->name('frontend.organisasi');
Route::get('/staff', [HomeController::class, 'employee'])->name('frontend.employee');
Route::get('/kerjasama-industri', [HomeController::class, 'cooperation'])->name('frontend.cooperation');


// Akademik Route
Route::get('/d4-trpl', [HomeController::class, 'trpl'])->name('frontend.trpl');
Route::get('/d4-trk', [HomeController::class, 'trk'])->name('frontend.trk');
Route::get('/d4-bisnis-digital', [HomeController::class, 'bsd'])->name('frontend.bsd');
Route::get('/kalender-akademik', [HomeController::class, 'kalender'])->name('frontend.kalender');
Route::get('/pedoman-akademik', [HomeController::class, 'pedoman'])->name('frontend.pedoman');
Route::get('/peraturan-akademik', [HomeController::class, 'peraturan'])->name('frontend.peraturan');
Route::get('/jalur-masuk', [HomeController::class, 'jalurmasuk'])->name('frontend.jalurmasuk');
Route::get('/beasiswa', [HomeController::class, 'beasiswa'])->name('frontend.beasiswa');
Route::get('/biaya-pendidikan', [HomeController::class, 'biaya'])->name('frontend.biaya');

//indikator kinerja utama
Route::get('/indikator-kinerja', [HomeController::class, 'indikator_kinerja'])->name('frontend.indikator-kinerja');
Route::get('/apps/sasaran_kinerjas/kode-options', [SasaranKinerjaController::class, 'kodeOptions']);
Route::get('/apps/indikator_kinerja_kegiatans/kode-options', [IndikatorKinerjaKegiatanController::class, 'kodeOptions']);
Route::post('/apps/target-realisasi/{id}/update-inline', [TargetRealisasiController::class, 'updateInline']);
Route::get('/indikator-kinerja/export/{format}', [HomeController::class, 'export_indikator_kinerja'])->name('frontend.indikator-kinerja.export');
Route::get('/indikator-kinerja/{prodi?}', [HomeController::class, 'indikator_kinerja'])->name('frontend.indikator-kinerja');

// Route::get('/load-indikator-kinerja/{id}', [HomeController::class, 'loadIndikatorKinerja']);

// Kemahasiswaan
Route::get('/prestasi-mahasiswa', [HomeController::class, 'presma'])->name('frontend.kemahasiswaan.presma');
Route::get('/ormawa', [HomeController::class, 'ormawa'])->name('frontend.ormawa');
Route::get('/kehidupan-kampus', [HomeController::class, 'kehidupan'])->name('frontend.kehidupan');

// Dokumen Route
Route::get('/dokumen', [HomeController::class, 'document'])->name('frontend.document');


Route::get('/publikasi-jurusan', [PublikasiController::class, 'publikasijurusan'])->name('frontend.publikasi_jurusan');
Route::get('/publikasi-prodi-trpl', [PublikasiController::class, 'publikasiproditrpl'])->name('frontend.publikasi_prodi_trpl');
Route::get('/publikasi-prodi-trk', [PublikasiController::class, 'publikasiproditrk'])->name('frontend.publikasi_prodi_trk');
Route::get('/publikasi-prodi-bsd', [PublikasiController::class, 'publikasiprodibsd'])->name('frontend.publikasi_prodi_bsd');




// Back End Route
Route::get('auth', function () {
    return view('backend.auth.login');
})->middleware(['guest:' . config('fortify.guard')])->name('login');

Route::get('forgot-passord', function () {
    return view('backend.auth.forgot-password');
})->middleware(['guest:' . config('fortify.guard')])->name('password.request');

Route::get('reset-password', function () {
    return view('backend.auth.reset-password', ['request' => Request::all()]);
})->middleware(['guest:' . config('fortify.guard')])->name('password.reset');


//Slug Page
Route::get('/detail-staff/{slug}', [HomeController::class, 'detailStaff'])->name('frontend.detail');
Route::get('/presma-detail/{slug}', [HomeController::class, 'achievement'])->name('frontend.kemahasiswaan.presma_detail');
Route::get('/all-event', [HomeController::class, 'allevent'])->name('frontend.all_event');
Route::get('/event/{slug}', [HomeController::class, 'event'])->name('frontend.events');
Route::get('/{slug}', [HomeController::class, 'pageBySlug'])->name('frontend.home');




Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Route for administrator
    Route::prefix('apps')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboards')->middleware('can:read-dashboards');

        // Employee Program Studi
        Route::prefix('employee-program-studis')->middleware('can:read-employee-program-studis')->group(function () {
            Route::get('', [EmployeeProgramStudiController::class, 'index'])->name('employee-program-studis')->middleware('can:read-employee-program-studis');
            Route::get('get-data', [EmployeeProgramStudiController::class, 'getData'])->name('employee-program-studis.get-data')->middleware('can:read-employee-program-studis');
            Route::post('store', [EmployeeProgramStudiController::class, 'store'])->name('employee-program-studis.store')->middleware('can:create-employee-program-studis');
            Route::get('{employeeProgramStudi}/show', [EmployeeProgramStudiController::class, 'show'])->name('employee-program-studis.show')->middleware('can:update-employee-program-studis');
            Route::post('{employeeProgramStudi}/update', [EmployeeProgramStudiController::class, 'update'])->name('employee-program-studis.update')->middleware('can:update-employee-program-studis');
            Route::delete('{employeeProgramStudi}/delete', [EmployeeProgramStudiController::class, 'destroy'])->name('employee-program-studis.delete')->middleware('can:delete-employee-program-studis');
        });


        // Employee Type
        Route::prefix('employee-types')->middleware('can:read-employee-types')->group(function () {
            Route::get('', [EmployeeTypeController::class, 'index'])->name('employee-types')->middleware('can:read-employee-types');
            Route::get('get-data', [EmployeeTypeController::class, 'getData'])->name('employee-types.get-data')->middleware('can:read-employee-types');
            Route::post('store', [EmployeeTypeController::class, 'store'])->name('employee-types.store')->middleware('can:create-employee-types');
            Route::get('{employeeType}/show', [EmployeeTypeController::class, 'show'])->name('employee-types.update')->middleware('can:update-employee-types');
            Route::post('{employeeType}/update', [EmployeeTypeController::class, 'update'])->name('employee-types.update')->middleware('can:update-employee-types');
            Route::delete('{employeeType}/delete', [EmployeeTypeController::class, 'destroy'])->name('employee-types.delete')->middleware('can:delete-employee-types');
        });

         // Employee Status
         Route::prefix('employee-statuses')->middleware('can:read-employee-statuses')->group(function () {
            Route::get('', [EmployeeStatusController::class, 'index'])->name('employee-statuses')->middleware('can:read-employee-statuses');
            Route::get('get-data', [EmployeeStatusController::class, 'getData'])->name('employee-statuses.get-data')->middleware('can:read-employee-statuses');
            Route::post('store', [EmployeeStatusController::class, 'store'])->name('employee-statuses.store')->middleware('can:create-employee-statuses');
            Route::get('{employeeStatus}/show', [EmployeeStatusController::class, 'show'])->name('employee-statuses.update')->middleware('can:update-employee-statuses');
            Route::post('{employeeStatus}/update', [EmployeeStatusController::class, 'update'])->name('employee-statuses.update')->middleware('can:update-employee-statuses');
            Route::delete('{employeeStatus}/delete', [EmployeeStatusController::class, 'destroy'])->name('employee-statuses.delete')->middleware('can:delete-employee-statuses');

        });

        //events
        //route event
        Route::prefix('events')->middleware('can:read-events')->group(function () {
            Route::get('', [EventController::class, 'index'])->name('events')->middleware('can:read-events');
            Route::get('get-data', [EventController::class, 'getData'])->name('events.get-data')->middleware('can:read-events');
            Route::post('store', [EventController::class, 'store'])->name('events.store')->middleware('can:create-events');
            Route::get('{event}/show', [EventController::class, 'show'])->name('events.update')->middleware('can:update-events');
            Route::post('{event}/update', [EventController::class, 'update'])->name('events.update')->middleware('can:update-events');
            Route::delete('{event}/delete', [EventController::class, 'destroy'])->name('events.delete')->middleware('can:delete-events');
            Route::get('{event}/update-status', [EventController::class, 'updateStatus'])->name('events.updateStatus')->middleware('can:update-events'); // Sesuaikan dengan middleware Anda
        });


        // Employee
        Route::prefix('employees')->middleware('can:read-employees')->group(function () {
            Route::get('', [EmployeeController::class, 'index'])->name('employees')->middleware('can:read-employees');
            Route::get('get-data', [EmployeeController::class, 'getData'])->name('employees.get-data')->middleware('can:read-employees');
            Route::post('store', [EmployeeController::class, 'store'])->name('employees.store')->middleware('can:create-employees');
            Route::get('{employee}/show', [EmployeeController::class, 'show'])->name('employees.update')->middleware('can:update-employees');
            Route::post('{employee}/update', [EmployeeController::class, 'update'])->name('employees.update')->middleware('can:update-employees');
            Route::delete('{employee}/delete', [EmployeeController::class, 'destroy'])->name('employees.delete')->middleware('can:delete-employees');
        });
        // Document
        Route::prefix('documents')->middleware('can:read-documents')->group(function () {
            Route::get('', [DocumentController::class, 'index'])->name('documents')->middleware('can:read-documents');
            Route::get('get-data', [DocumentController::class, 'getData'])->name('documents.get-data')->middleware('can:read-documents');
            Route::post('store', [DocumentController::class, 'store'])->name('documents.store')->middleware('can:create-documents');
            Route::get('{document}/show', [DocumentController::class, 'show'])->name('documents.update')->middleware('can:update-documents');
            Route::post('{document}/update', [DocumentController::class, 'update'])->name('documents.update')->middleware('can:update-documents');
            Route::delete('{document}/delete', [DocumentController::class, 'destroy'])->name('documents.delete')->middleware('can:delete-documents');
            Route::get('{document}/update-status', [DocumentController::class, 'updateStatus'])->name('documents.updateStatus')->middleware('can:update-documents');
        });
        // Menu
        Route::prefix('menus')->middleware('can:read-menus')->group(function () {
            Route::get('', [MenuController::class, 'index'])->name('menus')->middleware('can:read-menus');
            Route::get('get-data', [MenuController::class, 'getData'])->name('menus.get-data')->middleware('can:read-menus');
            Route::post('store', [MenuController::class, 'store'])->name('menus.store')->middleware('can:create-menus');
            Route::get('{menu}/show', [MenuController::class, 'show'])->name('menus.update')->middleware('can:update-menus');
            Route::post('{menu}/update', [MenuController::class, 'update'])->name('menus.update')->middleware('can:update-menus');
            Route::delete('{menu}/delete', [MenuController::class, 'destroy'])->name('menus.delete')->middleware('can:delete-menus');
            Route::get('{menu}/update-status', [MenuController::class, 'updateStatus'])->name('menus.updateStatus')->middleware('can:update-menus');
        });


        // Page
        Route::prefix('pages')->middleware('can:read-pages')->group(function () {
            Route::get('', [PageController::class, 'index'])->name('pages')->middleware('can:read-pages');
            Route::get('get-data', [PageController::class, 'getData'])->name('pages.get-data')->middleware('can:read-pages');
            Route::post('store', [PageController::class, 'store'])->name('pages.store')->middleware('can:create-pages');
            Route::get('{page}/show', [PageController::class, 'show'])->name('pages.update')->middleware('can:update-pages');
            Route::post('{page}/update', [PageController::class, 'update'])->name('pages.update')->middleware('can:update-pages');
            Route::delete('{page}/delete', [PageController::class, 'destroy'])->name('pages.delete')->middleware('can:delete-pages');
            Route::get('{page}/update-status', [PageController::class, 'updateStatus'])->name('pages.updateStatus')->middleware('can:update-pages');
        });

                // Achievement Program Studi
        Route::prefix('achievement-program-studis')->middleware('can:read-achievement-program-studis')->group(function () {
            Route::get('', [AchievementProgramStudiController::class, 'index'])->name('achievement-program-studis')->middleware('can:read-achievement-program-studis');
            Route::get('get-data', [AchievementProgramStudiController::class, 'getData'])->name('achievement-program-studis.get-data')->middleware('can:read-achievement-program-studis');
            Route::post('store', [AchievementProgramStudiController::class, 'store'])->name('achievement-program-studis.store')->middleware('can:create-achievement-program-studis');
            Route::get('{achievementProgramStudi}/show', [AchievementProgramStudiController::class, 'show'])->name('achievement-program-studis.show')->middleware('can:update-achievement-program-studis');
            Route::post('{achievementProgramStudi}/update', [AchievementProgramStudiController::class, 'update'])->name('achievement-program-studis.update')->middleware('can:update-achievement-program-studis');
            Route::delete('{achievementProgramStudi}/delete', [AchievementProgramStudiController::class, 'destroy'])->name('achievement-program-studis.delete')->middleware('can:delete-achievement-program-studis');
        });


        // Achievement Type
        Route::prefix('achievement-types')->middleware('can:read-achievement-types')->group(function () {
            Route::get('', [AchievementTypeController::class, 'index'])->name('achievement-types')->middleware('can:read-achievement-types');
            Route::get('get-data', [AchievementTypeController::class, 'getData'])->name('achievement-types.get-data')->middleware('can:read-achievement-types');
            Route::post('store', [AchievementTypeController::class, 'store'])->name('achievement-types.store')->middleware('can:create-achievement-types');
            Route::get('{achievementType}/show', [AchievementTypeController::class, 'show'])->name('achievement-types.update')->middleware('can:update-achievement-types');
            Route::post('{achievementType}/update', [AchievementTypeController::class, 'update'])->name('achievement-types.update')->middleware('can:update-achievement-types');
            Route::delete('{achievementType}/delete', [AchievementTypeController::class, 'destroy'])->name('achievement-types.delete')->middleware('can:delete-achievement-types');
        });

        // Achievement Level
        Route::prefix('achievement-levels')->middleware('can:read-achievement-levels')->group(function () {
            Route::get('', [AchievementLevelController::class, 'index'])->name('achievement-levels')->middleware('can:read-achievement-levels');
            Route::get('get-data', [AchievementLevelController::class, 'getData'])->name('achievement-levels.get-data')->middleware('can:read-achievement-levels');
            Route::post('store', [AchievementLevelController::class, 'store'])->name('achievement-levels.store')->middleware('can:create-achievement-levels');
            Route::get('{achievementLevel}/show', [AchievementLevelController::class, 'show'])->name('achievement-levels.update')->middleware('can:update-achievement-levels');
            Route::post('{achievementLevel}/update', [AchievementLevelController::class, 'update'])->name('achievement-levels.update')->middleware('can:update-achievement-levels');
            Route::delete('{achievementLevel}/delete', [AchievementLevelController::class, 'destroy'])->name('achievement-levels.delete')->middleware('can:delete-achievement-levels');
        });

            // Achievement
        Route::prefix('achievements')->middleware('can:read-achievements')->group(function () {
            Route::get('', [AchievementController::class, 'index'])->name('achievements')->middleware('can:read-achievements');
            Route::get('get-data', [AchievementController::class, 'getData'])->name('achievements.get-data')->middleware('can:read-achievements');
            Route::post('store', [AchievementController::class, 'store'])->name('achievements.store')->middleware('can:create-achievements');
            Route::get('{achievement}/show', [AchievementController::class, 'show'])->name('achievements.show')->middleware('can:update-achievements');
            Route::post('{achievement}/update', [AchievementController::class, 'update'])->name('achievements.update')->middleware('can:update-achievements');
            Route::put('{achievement}/update', [AchievementController::class, 'update'])->name('achievements.update')->middleware('can:update-achievements');
            Route::delete('{achievement}/delete', [AchievementController::class, 'destroy'])->name('achievements.delete')->middleware('can:delete-achievements');
            Route::get('{achievement}/update-status', [AchievementController::class, 'updateStatus'])->name('achievements.updateStatus')->middleware('can:update-achievements'); // Sesuaikan dengan middleware Anda
        });


        // Document Type
        Route::prefix('document-types')->middleware('can:read-document-types')->group(function () {
            Route::get('', [DocumentTypeController::class, 'index'])->name('document-types')->middleware('can:read-document-types');
            Route::get('get-data', [DocumentTypeController::class, 'getData'])->name('document-types.get-data')->middleware('can:read-document-types');
            Route::post('store', [DocumentTypeController::class, 'store'])->name('document-types.store')->middleware('can:create-document-types');
            Route::get('{documentType}/show', [DocumentTypeController::class, 'show'])->name('document-types.update')->middleware('can:update-document-types');
            Route::post('{documentType}/update', [DocumentTypeController::class, 'update'])->name('document-types.update')->middleware('can:update-document-types');
            Route::delete('{documentType}/delete', [DocumentTypeController::class, 'destroy'])->name('document-types.delete')->middleware('can:delete-document-types');
        });
        // Cooperation Type
        Route::prefix('cooperation-types')->middleware('can:read-cooperation-types')->group(function () {
            Route::get('', [CooperationTypeController::class, 'index'])->name('cooperation-types')->middleware('can:read-cooperation-types');
            Route::get('get-data', [CooperationTypeController::class, 'getData'])->name('cooperation-types.get-data')->middleware('can:read-cooperation-types');
            Route::post('store', [CooperationTypeController::class, 'store'])->name('cooperation-types.store')->middleware('can:create-cooperation-types');
            Route::get('{cooperationType}/show', [CooperationTypeController::class, 'show'])->name('cooperation-types.update')->middleware('can:update-cooperation-types');
            Route::post('{cooperationType}/update', [CooperationTypeController::class, 'update'])->name('cooperation-types.update')->middleware('can:update-cooperation-types');
            Route::delete('{cooperationType}/delete', [CooperationTypeController::class, 'destroy'])->name('cooperation-types.delete')->middleware('can:delete-cooperation-types');
        });

        // Cooperation Field
        Route::prefix('cooperation-fields')->middleware('can:read-cooperation-fields')->group(function () {
            Route::get('', [CooperationFieldController::class, 'index'])->name('cooperation-fields')->middleware('can:read-cooperation-fields');
            Route::get('get-data', [CooperationFieldController::class, 'getData'])->name('cooperation-fields.get-data')->middleware('can:read-cooperation-fields');
            Route::post('store', [CooperationFieldController::class, 'store'])->name('cooperation-fields.store')->middleware('can:create-cooperation-fields');
            Route::get('{cooperationField}/show', [CooperationFieldController::class, 'show'])->name('cooperation-fields.update')->middleware('can:update-cooperation-fields');
            Route::post('{cooperationField}/update', [CooperationFieldController::class, 'update'])->name('cooperation-fields.update')->middleware('can:update-cooperation-fields');
            Route::delete('{cooperationField}/delete', [CooperationFieldController::class, 'destroy'])->name('cooperation-fields.delete')->middleware('can:delete-cooperation-fields');
        });

        // Cooperation
        Route::prefix('cooperations')->middleware('can:read-cooperations')->group(function () {
            Route::get('', [CooperationController::class, 'index'])->name('cooperations')->middleware('can:read-cooperations');
            Route::get('get-data', [CooperationController::class, 'getData'])->name('cooperations.get-data')->middleware('can:read-cooperations');
            Route::post('store', [CooperationController::class, 'store'])->name('cooperations.store')->middleware('can:create-cooperations');
            Route::get('{cooperation}/show', [CooperationController::class, 'show'])->name('cooperations.update')->middleware('can:update-cooperations');
            Route::post('{cooperation}/update', [CooperationController::class, 'update'])->name('cooperations.update')->middleware('can:update-cooperations');
            Route::delete('{cooperation}/delete', [CooperationController::class, 'destroy'])->name('cooperations.delete')->middleware('can:delete-cooperations');
            Route::get('{cooperation}/update-status', [CooperationController::class, 'updateStatus'])->name('cooperations.updateStatus')->middleware('can:update-cooperations');

        });


        // Partner
        Route::prefix('partners')->middleware('can:read-partners')->group(function () {
            Route::get('', [PartnerController::class, 'index'])->name('partners')->middleware('can:read-partners');
            Route::get('get-data', [PartnerController::class, 'getData'])->name('partners.get-data')->middleware('can:read-partners');
            Route::post('store', [PartnerController::class, 'store'])->name('partners.store')->middleware('can:create-partners');
            Route::get('{partner}/show', [PartnerController::class, 'show'])->name('partners.show')->middleware('can:update-partners');
            Route::post('{partner}/update', [PartnerController::class, 'update'])->name('partners.update')->middleware('can:update-partners');
            Route::delete('{partner}/delete', [PartnerController::class, 'destroy'])->name('partners.delete')->middleware('can:delete-partners');
        });


        // Roles
        Route::prefix('roles')->middleware('can:read-roles')->group(function () {
            Route::get('', [RoleController::class, 'index'])->name('roles');
            Route::get('getData', [RoleController::class, 'getData'])->name('roles.get-data');
            Route::post('store', [RoleController::class, 'store'])->name('roles.store')->middleware('can:create-roles');
            Route::get('{role}/show', [RoleController::class, 'show'])->name('roles.update')->middleware('can:update-roles');
            Route::post('{role}/update', [RoleController::class, 'update'])->name('roles.update')->middleware('can:update-roles');
            Route::delete('{role}/delete', [RoleController::class, 'destroy'])->name('roles.delete')->middleware('can:delete-roles');
            Route::get('{role}/change-permission', [PermissionController::class, 'index'])->name('roles.change-permissions');
            Route::post('{role}/update-permission', [PermissionController::class, 'changePermission'])->name('roles.update-permission')->middleware('can:change-permissions');
        });

        // Users
        Route::prefix('users')->middleware('can:read-users')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('users');
            Route::get('getData', [UserController::class, 'getData'])->name('users.get-data');
            Route::get('create', [UserController::class, 'create'])->name('users.create')->middleware('can:create-users');
            Route::post('store', [UserController::class, 'store'])->name('users.store')->middleware('can:create-users');
            Route::get('{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('can:update-users');
            Route::post('{user}/update', [UserController::class, 'update'])->name('users.update')->middleware('can:update-users');
            Route::delete('{user}/delete', [UserController::class, 'destroy'])->name('users.delete')->middleware('can:delete-users');
            Route::get('{user}/update-status', [UserController::class, 'updateStatus'])->name('users.updateStatus')->middleware('can:update-users');
        });

        // Settings
        Route::prefix('settings')->middleware('can:read-settings')->group(function () {
            Route::get('', [SettingController::class, 'index'])->name('settings');
            Route::post('', [SettingController::class, 'update'])->middleware('can:update-settings')->name('api.settings');
        });

        // Indikator Kinerja Utama Jurusan

        // Route Sasaran Kinerja
        Route::prefix('sasaran_kinerjas')->name('sasaran-kinerja.')->group(function () {
            Route::get('/', [SasaranKinerjaController::class, 'index'])->name('index');
            Route::get('/list', [SasaranKinerjaController::class, 'list'])->name('list');
            Route::get('/{id}', [SasaranKinerjaController::class, 'show'])->name('show');
            Route::post('/', [SasaranKinerjaController::class, 'store'])->name('store');
            Route::put('/{id}', [SasaranKinerjaController::class, 'update'])->name('update');
            Route::delete('/{id}', [SasaranKinerjaController::class, 'destroy'])->name('destroy');
        });

        // Route Indikator Kinerja Kegiatan 
        Route::prefix('indikator_kinerja_kegiatans')->name('indikator-kinerja-kegiatan.')->group(function () {
            Route::get('/', [IndikatorKinerjaKegiatanController::class, 'index'])->name('index');
            Route::get('/list', [IndikatorKinerjaKegiatanController::class, 'list'])->name('list');
            Route::get('/{id}', [IndikatorKinerjaKegiatanController::class, 'show'])->name('show');
            Route::post('/', [IndikatorKinerjaKegiatanController::class, 'store'])->name('store');
            Route::put('/{id}', [IndikatorKinerjaKegiatanController::class, 'update'])->name('update');
            Route::delete('/{id}', [IndikatorKinerjaKegiatanController::class, 'destroy'])->name('destroy');
        });

        // Route Target Realisasi 
        Route::prefix('target_realisasis')->name('target-realisasi.')->group(function () {
            Route::get('/', [TargetRealisasiController::class, 'index'])->name('index');
            Route::get('/list', [TargetRealisasiController::class, 'list'])->name('list');
            Route::get('/{id}', [TargetRealisasiController::class, 'show'])->name('show');
            Route::post('/', [TargetRealisasiController::class, 'store'])->name('store');
            Route::put('/{id}', [TargetRealisasiController::class, 'update'])->name('update');
            Route::delete('/{id}', [TargetRealisasiController::class, 'destroy'])->name('destroy');
        });

    });
});




