<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'Api\LoginController@getToken');

Route::group(['prefix' => 'search', 'namespace' => 'api'], function () {
    Route::group(['prefix' => 'students'], function () {
        Route::get('/', 'SearchController@getStudents');
        Route::get('filters', 'SearchController@getStudentFilters');
    });

    Route::group(['prefix' => 'companies'], function () {
        Route::get('/', 'SearchController@getCompanies');
        Route::get('filters', 'SearchController@getCompanyFilters');
    });
});

Route::group(['prefix' => 'profile', 'namespace' => 'api'], function () {
    Route::put('/', 'ProfileController@update');
});

Route::resource('alert', 'Api\AlertController');

Route::group(['prefix' => 'profile'], function () {
    Route::get('/student', 'ProfileController@getJSONStudentProfile');
    Route::get('/company', 'ProfileController@getJSONCompanyProfile');
    Route::get('/validator', 'ProfileController@getJSONValidatorProfile');
});

Route::group(['prefix' => 'nudges'], function () {
    Route::get('/', 'NudgeController@getJSONNudges');
});

Route::group(['prefix' => 'validators'], function () {
    Route::get('/', 'ValidatorController@getJSONValidators');
    Route::put('/{id}', 'ValidatorController@toggleStatus');
});

Route::group(['prefix' => 'validation'], function () {
    Route::get('/', 'ValidationController@getJSONStudentsValidation');
});
