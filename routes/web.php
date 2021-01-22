<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('/announcement-create', [AnnouncementController::class, 'create'])->name('announcement.create');

Route::get('/thank-you', [AnnouncementController::class, 'thankyou'])->name('thankyou');

Route::post('/announcement-store', [AnnouncementController::class, 'store'])->name('announcement.store');

Route::get('/category/{name}/{id}/announcements', [HomeController::class, 'filtercategory'])->name('filtercategory');

Route::get('/show/{id}', [HomeController::class, 'show'])->name('announcement.show');

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/headersearch', [HomeController::class, 'headersearch'])->name('headersearch');

Route::get('/work-with-us', [AnnouncementController::class, 'workwithus'])->name('workwithus');

Route::post('/locale/{locale}', [HomeController::class, 'locale'])->name('locale');


//Rotte di dropzone
Route::post('/announcement/images/upload', [AnnouncementController::class,'uploadImage'])->name('announcement.images.upload');

Route::get('/announcement/images', [AnnouncementController::class, 'getImages'])->name('announcement.images');

Route::delete('/announcement/images/remove', [AnnouncementController::class, 'removeImage'])->name('announcement.images.remove');


//Rotte della mail
Route::post('/ask-work', [AnnouncementController::class, 'askwork'])->name('askwork');


/* Rotte del revisore */
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.homepage');

Route::put('/revisor/announcement/{id}/accepted', [RevisorController::class, 'accept'])->name('revisor.accept');

Route::put('/revisor/announcement/{id}/rejected', [RevisorController::class, 'reject'])->name('revisor.reject');

Route::get('/revisor/deleted', [RevisorController::class, 'deleted'])->name('revisor.deleted');

Route::put('/revisor/announcement/{id}/restore', [RevisorController::class, 'restore'])->name('revisor.restore');

Route::get('/revisor/deleted/search', [RevisorController::class, 'revisorsearch'])->name('revisorsearch');


/* Rotte dell'admin */
Route::get('/admin/pick-revisor', [AdminController::class, 'pickrevisor'])->name('pickrevisor');

Route::put('/admin/pick-revisor/{id}/is-revisor', [AdminController::class, 'acceptrevisor'])->name('acceptrevisor');

Route::put('/admin/remove-revisor/{id}/is-revisor', [AdminController::class, 'removerevisor'])->name('removerevisor');

Route::get('/admin-search', [AdminController::class, 'adminsearch'])->name('adminsearch');

Route::put('/admin/pick-admin/{id}/is-admin', [AdminController::class, 'acceptadmin'])->name('acceptadmin');

Route::put('/admin/remove-admin/{id}/is-admin', [AdminController::class, 'removeadmin'])->name('removeadmin');
