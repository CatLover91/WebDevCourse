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

Route::get('questions', 'questionController@showQuestions');
Route::get('answers', 'answerController@showAnswers');
Route::get('profile', 'profileeController@showProfile');

Route::post(
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

<?php

/*
Route::get('/', 'HomeController@ShowIndex');
Route::get('syllabary', 'SyllabaryController@ShowGrid');
Route::get('about', 'HomeController@ShowAbout');
Route::get('sleep', function() { return Redirect::away('http://Ncnl.tumblr.com'); });
*/

Route::get('/', 'HomeController@ShowIndex');
Route::get('about', 'HomeController@ShowAbout');

Route::get('syllabary', 'SyllabaryController@ShowGrid');
Route::post('syllabary/{syllabaryId}/column/add', 'SyllabaryController@AddColumn');
Route::post('syllabary/{syllabaryId}/column/{columnIndex}/remove', 'SyllabaryController@RemoveColumn');
Route::post('syllabary/{syllabaryId}/row/add', 'SyllabaryController@AddRow');
Route::post('syllabary/{syllabaryId}/row/{rowIndex}/remove', 'SyllabaryController@RemoveRow');

Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function()
{
	Route::get('login', 'AuthController@ShowLogin');
	Route::post('login', 'AuthController@DoLogin');
});

/*
Route::controllers(
[
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/