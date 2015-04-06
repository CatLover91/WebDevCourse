<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('/', 'app/controllers/HomeController@index');
Route::get('question/{question_id}', 'QuestionController@showQuestion');
Route::get('user/{user_id}', 'UserController@showProfile');

Route::post('user/{user_id}/addAvatar', 'UserController@addAvatar');

Route::post('question/add', 'QuestionController@addQuestion');
Route::post('question/{question_id}/upVote', 'QuestionController@upVote');
Route::post('question/{question_id}/downVote', 'QuestionController@downVote');
Route::post('question/{question_id}/removeVote', 'QuestionController@removeVote');
Route::post('question/{question_id}/changeVote', 'QuestionController@changeVote');

Route::post('question/{question_id}/answer/add', 'AnswerController@addAnswer');
Route::post('question/{question_id}/answer/{answer_id}/upVote', 'QuestionController@upVote');
Route::post('question/{question_id}/answer/{answer_id}/downVote', 'QuestionController@downVote');
Route::post('question/{question_id}/answer/{answer_id}/removeVote', 'QuestionController@removeVote');
Route::post('question/{question_id}/answer/{answer_id}/markBest', 'QuestionController@markBest');
Route::post('question/{question_id}/answer/{answer_id}/unmarkBest', 'QuestionController@unmarkBest');

Route::resource('photo', 'PhotoController');

/*Route::controllers([
	'auth' => 'AuthController',
	// dont need email verification
    //'password' => 'Auth\PasswordController',
]);*/