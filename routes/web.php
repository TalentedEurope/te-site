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
Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')
        ->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')
        ->name('email-verification.check');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'profile'], function () {
    // Public URIS
    Route::get('/{slug}/{id}', 'ProfileController@getUserProfile')->name('get_profile');

    // Private URIS
    Route::get('/', 'ProfileController@index')->name('view_profile');
    Route::get('edit', 'ProfileController@getEdit')->name('edit_profile');
    Route::post('edit', 'ProfileController@postEdit')->name('update_profile');

    // Profile file downloads.
    Route::get('/curriculum/{id}', 'ProfileController@getCurriculum')->name('get_curriculum');
    Route::get('/gradecard/{id}/study/{studyId}', 'ProfileController@getStudyGradeCard')->name('get_study_gradecard');
    Route::get('/certificate/{id}/study/{studyId}', 'ProfileController@getStudyCertificate')->name('get_study_certificate');
    Route::get('/certificate/{id}/training/{studyId}', 'ProfileController@getTrainingCertificate')->name('get_training_certificate');
    Route::get('/certificate/{id}/language/{studyId}', 'ProfileController@getLanguageCertificate')->name('get_language_certificate');
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
    Route::get('/students', 'SearchController@searchStudents')->name('searchStudents');
    Route::get('/companies', 'SearchController@searchCompanies')->name('searchCompanies');
});
