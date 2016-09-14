<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

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
