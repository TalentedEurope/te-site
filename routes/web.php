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

// Static pages
Route::get('/', 'StaticController@getLanding');
Route::get('/cookies', 'StaticController@getCookies');
Route::get('/privacy-policy', 'StaticController@getPrivacyPolicy');
Route::get('/legal-warning', 'StaticController@getLegalWarning');
Route::get('/terms', 'StaticController@getTerms');
Route::get('/faq', 'StaticController@getFaq');

// GDPR
Route::get('gdpr', 'StaticController@getGdpr')->name('get_gdpr')->middleware("auth");
Route::post('gdpr',  'StaticController@postGdpr')->name('post_gdpr');


// Auth related
Auth::routes();
Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')
        ->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')
        ->name('email-verification.check');
Route::get('/logout', 'Auth\LoginController@logout');

// Profiles
Route::group(['prefix' => 'profile'], function () {
    // Private URIS
    Route::get('/', 'ProfileController@getMyProfile')->name('view_profile');
    Route::get('edit', 'ProfileController@getEdit')->name('edit_profile');
    Route::post('edit', 'ProfileController@postEdit')->name('update_profile');

    // Profile file downloads.
    Route::get('/curriculum/{id}', 'ProfileController@getCurriculum')->name('get_curriculum');
    Route::get('/gradecard/{id}/study/{studyId}', 'ProfileController@getStudyGradeCard')->name('get_study_gradecard');
    Route::get('/certificate/{id}/institution', 'ProfileController@getInstitutionCertificate')->name('get_institution_certificate');
    Route::get('/certificate/{id}/study/{studyId}', 'ProfileController@getStudyCertificate')->name('get_study_certificate');
    Route::get('/certificate/{id}/training/{studyId}', 'ProfileController@getTrainingCertificate')->name('get_training_certificate');
    Route::get('/certificate/{id}/language/{studyId}', 'ProfileController@getLanguageCertificate')->name('get_language_certificate');

    // Public URIS
    Route::get('/{slug}/{id}', 'ProfileController@getProfile')->name('get_profile');

    // Request Validation
    Route::post('validation/request', 'ProfileController@requestValidation')->name('request-validation');
    Route::post('invite', 'ProfileController@inviteSchool')->name('invite-school');

    // Mitigation for wrong route.
    Route::get('invite', function(Illuminate\Http\Request $request) {
        $id = $request->input('req_id');
        return redirect(route('register') . "?req_id=".$id);
    });
});

// Nudge-Alert
Route::group(['prefix' => 'alerts'], function () {
    Route::get('/', 'AlertController@getAlerts')->name('view_alerts');
});

// Referees
Route::group(['prefix' => 'validators'], function () {
    Route::get('/', 'ValidatorController@index')->name('view_validators');
    Route::get('/{id}', 'ValidatorController@toggle')->name('old_toggle_validator');
    Route::get('/toggle/{id}', 'ValidatorController@toggle')->name('toggle_validator');

    // Invitations
    Route::post('/add', 'ValidatorController@add')->name('add_validator');
    Route::get('cancel/{id}', 'ValidatorController@deleteInvite')
        ->name('delete_invite');
    Route::get('confirm/{id}', 'ValidatorController@confirmInvite')
        ->name('confirm_validator');


    // Unasign validator from school. (Keeps the account)
    Route::get('delete/{id}', 'ValidatorController@delete')
        ->name('delete_validator');

    Route::get('change/{uid}', 'ValidatorController@changeInstitution')
        ->name('change_institution');

    // Register form for validator
    Route::get('register/{uid}', 'ValidatorController@getRegister')
        ->name('get_register_validator');
    Route::post('register/{uid}', 'ValidatorController@postRegister')
        ->name('post_register_validator');
});

// Referee
Route::group(['prefix' => 'validate'], function () {
    Route::get('/', 'ValidationController@index')->name('view_validate_students');
    Route::get('{id}', 'ValidationController@getValidate')->name('get_validate_student');
    Route::post('{id}', 'ValidationController@postValidate')->name('post_validate_student');
});

// Search
Route::group(['prefix' => 'search'], function () {
    Route::get('/', 'SearchController@index')->name('search');
    Route::get('/students', 'SearchController@searchStudents')->name('searchStudents');
    Route::get('/companies', 'SearchController@searchCompanies')->name('searchCompanies');
    Route::get('/institutions', 'SearchController@searchInstitutions')->name('searchInstitutions');
});

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');
Route::get('setup', 'Auth\RegisterController@getSetup')->name('getSetup');
Route::post('setup', 'Auth\RegisterController@postSetup');
