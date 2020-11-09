<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
  ], function(){

    Route::namespace('Dashboard')->prefix('admin')->name('admin.')->group(function(){


        Route::get('/', 'HomeController@index')->name('home');

        #################### Start Countries Routes #####################
        Route::resource('countries', 'CountriesController');
        #################### End Countries Routes #######################

        #################### Start Specialties Routes #####################
        Route::resource('specialties', 'SpecialtiesController');
        #################### End Specialties Routes #######################
        #################### Start Doctors Routes #####################
        Route::resource('doctors', 'DoctorsController')->except(['show']);
        #################### End Doctors Routes #######################

    });

  });
