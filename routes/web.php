<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Roles
|--------------------------------------------------------------------------
| 1.    Admin
| 2.    Loanee
| 3.    Customer
*/

// clear cache

Route::get('/clear', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::namespace('Front')->group(function () {

    Route::get('/', 'IndexController@index')->name('home');
    Route::get('/about-us', 'AboutController@index')->name('about');
    Route::get('/contact-us', 'ContactController@index')->name('contact');
    Route::post('/contact-us/store', 'ContactController@store')->name('contact.store');
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

    // LoanType page routes
    Route::resource('/loans', 'LoanController');

    // Category page routes
    Route::resource('/categories', 'CategoryController');
    Route::get('/categories/status/{id}', 'CategoryController@status')->name('categories.status');

    // Payment Types page routes
    Route::resource('/payment_types', 'PaymentTypeController');

    // Agreement page routes
    Route::get('/agreements', 'AgreementController@index')->name('agreement.index');
    Route::get('/agreement/create/{id}', 'AgreementController@create')->name('agreement.create');
    Route::post('/agreement/store', 'AgreementController@store')->name('agreement.store');
    Route::get('/agreement/edit/{id}', 'AgreementController@edit')->name('agreement.edit');
    Route::put('/agreement/update/{id}', 'AgreementController@update')->name('agreement.update');
    Route::get('/agreement/status/{id}', 'AgreementController@agreementStatus')->name('agreement.status');

    // Payment page routes
    Route::resource('/payments', 'PaymentController');
    Route::get('/payments/getAgreementInfo/{id}', 'PaymentController@getAgreementInfo')->name('getAgreementInfo');

    // Service page routes
    Route::resource('/services', 'ServiceController');
    Route::get('/services/getAgreementInfo/{id}', 'ServiceController@getAgreementInfo')->name('getAgreementInfo');

    // Loanee page routes
    Route::resource('/loanee', 'LoaneeController');
    Route::get('/loanee/active_deactive/{id}', 'LoaneeController@loaneeStatus')->name('loanee.status');

    // Product page routes
    Route::resource('/products', 'ProductController');
    Route::get('/products/getAgreementInfo/{id}', 'ProductController@getAgreementInfo')->name('getAgreementInfo');

    // Contact page routes
    Route::get('/contacts', 'ContactController@index')->name('contacts.index');
    Route::get('/contacts/readContact/{id}', 'ContactController@readContact')->name('contacts.readContact');
    Route::delete('/contacts/delete/{id}', 'ContactController@destroy')->name('contacts.destroy');
    
});

/*--------------------------------------------------------------------------*/


Auth::routes();

