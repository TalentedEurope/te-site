<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'profile'], function () {
    Route::get('/', 'ProfileController@index')->name('view_profile');
    Route::get('edit', 'ProfileController@edit')->name('edit_profile');
});

Route::group(['prefix' => 'nudges'], function () {
    Route::get('/', 'NudgeController@index')->name('view_nudges');
    Route::get('/{id}', 'NudgeController@delete')->name('delete_nudge');
});

Route::group(['prefix' => 'validators'], function () {
    Route::get('/', 'ValidatorController@index')->name('view_validators');
    Route::get('/{id}', 'ValidatorController@toggle')->name('toggle_validator');
});

Route::group(['prefix' => 'validate'], function () {
    Route::get('/', 'ValidationController@index')->name('view_validate_students');
});

Route::group(['prefix' => 'search'], function () {
    Route::get('/', 'SearchController@index')->name('search');
});
