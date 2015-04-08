<?php

use app\models\User as User;

class HomeController extends \BaseController {

    public function index() {
        $questions = Question::orderBy('value', 'desc')->get();

        foreach($questions as $question) {
            $question->content = substr($question->content, 0, 140).' ...';
        }

        return View::make('page.home', ['questions' => $questions, 'leftConnector' => null]);
    }
}