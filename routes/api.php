<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'search'], function () {
    Route::group(['prefix' => 'students'], function () {
        Route::get('/', 'SearchController@getJSONStudentsResults');
        Route::get('filters', 'FilterController@getJSONStudentsFilters');
    });

    Route::group(['prefix' => 'companies'], function () {
        Route::get('/', 'SearchController@getJSONCompaniesResults');
        Route::get('filters', 'FilterController@getJSONCompaniesFilters');
    });
});

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
