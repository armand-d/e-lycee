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

Route::get('/', ['as' => 'home', 'uses' => 'FrontController@index']);

Route::group(['middleware' => ['throttle:60,1']], function () {
    Route::any('connexion', 'LoginController@login');
});

Route::group([
    'middleware' => ['auth', 'adminTeacher']], function () {

    Route::resource('professeur', 'Admin\DashboardTeacherController');
    
    Route::resource('qcm', 'QcmController');
    Route::resource('article', 'ArticleController');
    Route::resource('user', 'UserController');

    Route::get('qcms/delete-multiple', 'QcmController@deleteMultiple');
    Route::post('qcm-update-status-multiple', 'QcmController@updateStatusMultiple');

    Route::get('articles/delete-multiple', 'ArticleController@deleteMultiple');
    Route::post('article-update-status-multiple', 'ArticleController@updateStatusMultiple');

    Route::post('update/teacher','UserController@updateTeacher');
    Route::get('user/delete/photo', 'UserController@deletePhoto');
    Route::post('user/replace/photo', 'UserController@replacePhoto');
    Route::get('user/delete/{id}', 'UserController@destroy');
});

Route::group([
    'middleware' => ['auth', 'adminStudent']], function () {
    Route::resource('etudiant', 'Admin\DashboardStudentController');
});

Route::get('logout', 'LoginController@logout');


