<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TeamController;

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

Route::get('/', [HomeController::class, 'showData'])->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('/admin-login', 'loginPage')->name('admin-login');

    Route::post('/admin-login', 'login')->name('login');

    Route::get('/logout', 'logout')->name('logout');
});

//route group for admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('admin.admin');
    })->name('/admin');

    //route group for faqs
    Route::group(['prefix' => 'faqs'], function () {
        Route::controller(FaqController::class)->group(function () {
            Route::get('/', 'getFaqs')->name('faqs');

            Route::get('/add', 'addFaqPage')->name('add-faq');

            Route::post('/add-faq', 'addFaq')->name('addFaq');

            Route::get('/edit/{id}', 'editFaqPage')->name('edit-faq');

            Route::put('/edit-faq/{id}', 'editFaq')->name('editFaq');

            Route::get('/delete/{id}', 'deleteFaq')->name('delete-faq');
        });
    });

    //route group for packages
    Route::group(['prefix' => 'packages'], function () {
        Route::controller(PackageController::class)->group(function () {
            Route::get('/', 'getPackages')->name('packages');

            Route::get('/add', 'addPackagePage')->name('add-package');

            Route::post('/add-package', 'addPackage')->name('addPackage');

            Route::get('/edit/{id}', 'editPackagePage')->name('edit-package');

            Route::put('/edit-package/{id}', 'editPackage')->name('editPackage');

            Route::get('/delete/{id}', 'deletePackage')->name('delete-package');
        });
    });

    //route group for testimonials
    Route::group(['prefix' => 'testimonials'], function () {
        Route::controller(TestimonialController::class)->group(function () {
            Route::get('/', 'getTestimonials')->name('testimonials');

            Route::get('/add', 'addTestimonialPage')->name('add-testimonial');

            Route::post('/add-testimonial', 'addTestimonial')->name('addTestimonial');

            Route::get('/edit/{id}', 'editTestimonialPage')->name('edit-testimonial');

            Route::put('/edit-testimonial/{id}', 'editTestimonial')->name('editTestimonial');

            Route::get('/delete/{id}', 'deleteTestimonial')->name('delete-testimonial');
        });
    });

    //route group for teams
    Route::group(['prefix' => 'teams'], function () {
        Route::controller(TeamController::class)->group(function () {
            Route::get('/', 'getTeams')->name('teams');

            Route::get('/add', 'addTeamPage')->name('add-team');

            Route::post('/add-team', 'addTeam')->name('addTeam');

            Route::get('/edit/{id}', 'editTeamPage')->name('edit-team');

            Route::put('/edit-team/{id}', 'editTeam')->name('editTeam');

            Route::get('/delete/{id}', 'deleteTeam')->name('delete-team');
        });
    });

    //route group for contacts
    Route::group(['prefix' => 'contacts'], function () {
        Route::controller(ContactController::class)->group(function () {
            Route::get('/', 'getContacts')->name('contacts');
        });
    });
});
