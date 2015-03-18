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

Route::controllers([
	'auth' => 'Auth\AuthController',
	// dont need email verification
    //'password' => 'Auth\PasswordController',
]);

Form::macro('upVote', function($voted) {
    
    <span class="fa-stack fa-lg">
        <i class="fa fa-square fa-stack-2x"></i>
        <i class="fa fa-chevron-up fa-stck-1x"></i>
    </span>
}
            
Form::macro('vote', function($voted, $up) {
    if($voted) {
        $class = ' voted';
    } else {
        $class = '';
    }
    
    if($up) {
        $icon = 'up';
    } else {
        $icon = 'down';
    }
    return '<button type="submit" class="btn btn-success'.$class.'"> 
        <span class="fa-stack fa-lg">
            <i class="fa fa-square fa-stack-2x"></i>
            <i class="fa fa-chevron-'.$icon.' fa-stck-1x"></i>
        </span>
    </button>';
}

Form::macro('best', function($marked) {
    if($marked) {
        return '<button type="submit" class="btn btn-success"> 
            <span class="fa-stack fa-lg">
                <i class="fa fa-square-o fa-stack-1x"></i>
                <i class="fa fa-check fa-stack-1x"></i>
            </span>
        </button>';
    } else {
        return '<button type="submit" class="btn btn-success"> 
            <i class="fa fa-square-o fa-lg"></i>
        </button>';
    }
    
    if($up) {
        $icon = 'up';
    } else {
        $icon = 'down';
    }
    return <span class="fa-stack fa-lg">
        <i class="fa fa-square-o fa-stack-1x"></i>
        <i class="fa fa-check fa-stack-1x"></i>
    </span>;
}