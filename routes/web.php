<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Roles
|--------------------------------------------------------------------------
| 1.    Admin
| 2.    Loanee
| 3.    Customer
|-----------------------------------Payment Type---------------------------
| 1.    Online
| 2.    By Hand
*/

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::namespace('Front')->group(function () {

    Route::get('/', 'IndexController@index')->name('home');
    Route::get('/about-us', 'AboutController@index')->name('about');
    Route::get('/contact-us', 'ContactController@index')->name('contact');
    Route::get('/how-does-it-works', 'HowDoesItWorkController@index')->name('howDoesItWork');
    Route::get('/shop', 'ShopController@index')->name('shop');
    
});

/*--------------------------------------------------------------------------*/

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');

    // Home page routes
    Route::resource('/slides', 'HomePageController');
    Route::get('/slides/active_deactive/{id}', 'HomePageController@sliderStatus')->name('slides.status');

    // Loan page routes
    Route::resource('/loans', 'LoanController');

    // Loan page routes
    Route::resource('/loanee', 'LoaneeController');
    Route::get('/loanee/active_deactive/{id}', 'LoaneeController@loaneeStatus')->name('loanee.status');
    
});

/*--------------------------------------------------------------------------*/


Auth::routes();

