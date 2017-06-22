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
Route::get('logout', 'Api\LoginController@removeToken');
Route::post('register', 'Api\RegisterController@registerUser');


Route::group(['prefix' => 'search', 'namespace' => 'Api'], function () {
    Route::group(['prefix' => 'students'], function () {
        Route::get('/', 'SearchController@getStudents');
        Route::get('filters', 'SearchController@getStudentFilters');
    });

    Route::group(['prefix' => 'companies'], function () {
        Route::get('/', 'SearchController@getCompanies');
        Route::get('filters', 'SearchController@getCompanyFilters');
    });

    Route::group(['prefix' => 'institutions'], function () {
        Route::get('/', 'SearchController@getInstitutions');
    });
});

Route::group(['prefix' => 'profile', 'namespace' => 'Api'], function () {
    Route::get('/institutions', 'ProfileController@getInstitutions');
    Route::put('/', 'ProfileController@update');
    Route::post('validation/request', 'ProfileController@requestValidation')->name('request-validation');
    Route::post('invite', 'ProfileController@inviteSchool')->name('invite-school');
    Route::get('/{id}', 'ProfileController@getUserProfile');
    Route::get('/', 'ProfileController@getOwnProfile');

    // Quit
    Route::delete('quit', 'ProfileController@quit')->name('quit');
});

Route::resource('alerts', 'Api\AlertController');

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

Route::get('institutions/{id}/validators', 'ValidatorController@getInstitutionValidators');
Route::get('institutions/{countryCode}', 'ValidatorController@getInstitutions');

Route::group(['prefix' => 'validation'], function () {
    Route::get('/', 'ValidationController@getJSONStudentsValidation');
});
