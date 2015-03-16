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

Route::get('/', 'HomeController@index');
Route::get('question', 'QuestionController@showQuestion');
Route::get('user/{user_id}/profile', 'UserController@showProfile');

Route::post('user/{user_id}/addAvatar', 'UserController@addAvatar);

Route::post('question/add', 'QuestionController@addQuestion');
Route::post('question/{question_id}/upVote', 'QuestionController@upVote');
Route::post('question/{question_id}/downVote', 'QuestionController@downVote');
Route::post('question/{question_id}/removeVote', 'QuestionController@removeVote');

Route::post('question/{question_id}/answer/add', 'AnswerController@addAnswer');
Route::post('question/{question_id}/answer/{answer_id}/upVote', 'QuestionController@upVote');
Route::post('question/{question_id}/answer/{answer_id}/downVote', 'QuestionController@downVote');
Route::post('question/{question_id}/answer/{answer_id}/removeVote', 'QuestionController@removeVote');
Route::post('question/{question_id}/answer/{answer_id}/markBest', 'QuestionController@markBest');
Route::post('question/{question_id}/answer/{answer_id}/unmarkBest', 'QuestionController@unmarkBest');

Route::controllers([
	'auth' => 'Auth\AuthController',
	// dont need email verification
    //'password' => 'Auth\PasswordController',
]);