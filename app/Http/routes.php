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
// Front-office
Route::get('/', ['as' => 'home', 'uses' => 'FrontController@index']);
Route::get('search', 'FrontController@search');
Route::get('actualites', 'FrontController@showActualites');
Route::get('actualite/{id}/{title}', 'FrontController@showSingleActualite');
Route::get('mentions-legales', 'FrontController@showMentionLegales');
Route::get('presentation', 'FrontController@showPresentation');
Route::get('contact', 'FrontController@showContact');

Route::resource('comment','CommentController');
// End front-office
// Login
Route::group(['middleware' => ['throttle:60,1']], function () {
    Route::any('connexion', 'LoginController@login');
});
// End login
// Admin
Route::group(['middleware' => ['auth']], function () {
    
    Route::post('update/user','UserController@updateUser');
    Route::post('user/replace/photo', 'UserController@replacePhoto');
    Route::get('user/delete/photo', 'UserController@deletePhoto');

    Route::group([
        'middleware' => ['adminTeacher']], function () {

        Route::resource('professeur/qcm', 'QcmController');
        Route::resource('professeur/article', 'ArticleController');
        Route::resource('professeur/eleve', 'userController');

        Route::get('professeur/tableau-de-bord', 'BackController@showDashboardTeacher');
        Route::get('professeur/profil', 'BackController@showProfilTeacher');

        Route::get('professeur/qcm/delete/multiple', 'QcmController@deleteMultiple');
        Route::post('professeur/qcm/update/multiple', 'QcmController@updateMultiple');

        Route::get('professeur/article/delete/multiple', 'ArticleController@deleteMultiple');
        Route::post('professeur/article/update/multiple', 'ArticleController@updateMultiple');
    });
    Route::group([
        'middleware' => ['adminStudent']], function () {

        Route::get('etudiant/tableau-de-bord', 'BackController@showDashboardStudent');
        Route::get('etudiant/profil', 'BackController@showProfilStudent');

        Route::get('etudiant/qcm', 'QcmController@indexStudent');
        Route::get('etudiant/qcm/{id}', 'QcmController@show');
    });
    
    Route::get('logout', 'LoginController@logout');
});
// End admin




