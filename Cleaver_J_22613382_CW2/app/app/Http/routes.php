<?php

/*
 * This Laravel routes file registers all different routes for the application.
 * It involves assigning the correct URL to the correct controller.
 * This uses an array of get, post, authorisation, group and resource functions to control the
 * pathways between pages/URLs
*/

Route::get('/respondent/{id}/{q_id}', 'RespondentController@index');
Route::post('/respondent/{id}/{q_id}', 'RespondentController@store');

Route::group(['middleware' => 'web'], function(){
    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::resource('admin/survey', 'SurveyController');
    Route::get('admin/destroy/{id}', 'SurveyController@destroy');
    Route::post('admin/question/create/{id}', 'SurveyController@store_question');
    Route::get('admin/option/{id}', 'OptionController@create');
    Route::post('admin/option/{id}', 'OptionController@store');
    Route::get('admin/responses/survey', 'ResponsesController@index');
    Route::get('admin/responses/question/{id}', 'ResponsesController@question_list');
    Route::get('admin/responses/{id}', 'ResponsesController@show');
});