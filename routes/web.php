<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClinicController;
use App\Http\Controllers\Admin\ControlUser;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Doctor\DateController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Nurse\SaveDateController;
use App\Http\Controllers\Nurse\NurseController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




///site localhost:8000/contct
Route::get('/', [SiteController::class, 'index'])->name('clinic.index');
Route::get('/contact', [SiteController::class, 'contact'])->name('clinic.contact');
Route::get('/clinics', [SiteController::class, 'clinics'])->name('clinic.clinics');
Route::get('/clinicsDetails/{id}', [SiteController::class, 'clinicsDetails'])->name('clinic.clinicsDetails');



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Profile updated for user and admin and manager and super admin
Route::post('updateProfile/{id}', [HomeController::class, 'updateProfile'])->name('updateProfile');


//Route For Admin
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    //index
    //store
    //edit
    Route::resource('sections', SectionController::class);
    Route::resource('clinics', ClinicController::class);
    Route::resource('users', ControlUser::class);
});


//Route For Doctor
Route::group(['middleware' => ['auth', 'doctor'], 'prefix' => 'doctor'], function () {

    Route::get('/', [DoctorController::class, 'index'])->name('doctor.home');
    Route::get('profile', [DoctorController::class, 'profile'])->name('doctor.profile');


    #######clinics
    Route::get('/clincs', [DoctorController::class, 'clincs'])->name('doctor.clinics');

    #######Dates
    Route::get('/clinic/dates/{id}', [DateController::class, 'index'])->name('dates.index');
    Route::get('/clinic/dates/create/{id}', [DateController::class, 'create'])->name('dates.create');
    Route::post('/clinic/dates/store/{id}', [DateController::class, 'store'])->name('dates.store');
    Route::get('/clinic/dates/show/{id}', [DateController::class, 'show'])->name('dates.show');
    Route::delete('/clinic/dates/destroy/{id}', [DateController::class, 'destroy'])->name('dates.destroy');
    Route::put('/clinic/dates/update/{id}', [DateController::class, 'update'])->name('dates.update');

    ###Finially dates
    Route::get('/clinic/booksDates/{id}', [DateController::class, 'booksDates'])->name('booksDates.index');
    Route::get('/clinic/booksDatesUpdate/{id}', [DateController::class, 'booksDatesUpdate'])->name('booksDates.update');
    Route::post('/clinic/booksDatesStore', [DateController::class, 'booksDatesStore'])->name('booksDates.store');
});


Route::group(['middleware' => ['auth', 'user'], 'prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.home');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');

    //Book
    Route::get('book/create/{id}', [BookController::class, 'create'])->name('book.create');
    Route::get('book/index', [BookController::class, 'index'])->name('book.index');
    Route::get('book/show/{id}', [BookController::class, 'show'])->name('book.show');

    Route::post('book/store/{id}', [BookController::class, 'store'])->name('book.store');
    Route::delete('book/delete/{id}', [BookController::class, 'delete'])->name('book.delete');
    Route::put('book/update/{id}', [BookController::class, 'update'])->name('book.update');
});

Route::group(['middleware' => ['auth', 'nurse'], 'prefix' => 'nurse'], function () {
    Route::get('/', [NurseController::class, 'index'])->name('nurse.home');
    Route::get('profile', [NurseController::class, 'profile'])->name('nurse.profile');
    Route::get('dates', [NurseController::class, 'dates'])->name('nurse.dates');

    Route::get('date/accept/{id}', [NurseController::class, 'accept'])->name('nurse.accept');
    Route::get('date/decline/{id}', [NurseController::class, 'decline'])->name('nurse.decline');
    Route::get('date/show/{id}', [NurseController::class, 'show'])->name('nurse.show');
    Route::post('date/store/{id}', [NurseController::class, 'store'])->name('nurse.store');


    Route::get('/clinic/booksDatesAccepted/{id}', [NurseController::class, 'booksDatesAccepted'])->name('booksDatesAccepted.index');



    Route::get('/clinic/complaints/{id}', [NurseController::class, 'complaints'])->name('complaints.index');

    ////////////////Save Dating Update  SaveDateController
    Route::get('/savedates/show/{id}', [SaveDateController::class, 'show'])->name('savedates.show');
    Route::get('/savedates/decline/{id}', [SaveDateController::class, 'decline'])->name('savedates.decline');
    Route::put('/savedates/update/{id}', [SaveDateController::class, 'update'])->name('savedates.update');
});