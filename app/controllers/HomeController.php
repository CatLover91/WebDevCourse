<?php namespace app\controllers;

use app\controllers\BaseController;
use app\Question;

class HomeController extends \BaseController {

    public function index() {
        $questions = Question::orderBy('value', 'desc')->get();
        
        foreach($questions as $question) {
            $question->content = substr($question->content, 0, 140).' ...';
        }
        
        return view('page.home', ['questions' => $questions, 'leftConnector' => null]);
    }
}