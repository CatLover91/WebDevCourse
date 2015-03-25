<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Question;

class HomeController extends Controller {

    public function index() {
        $questions = Question::orderBy('value', 'desc')->get();
        
        foreach($questions as $question) {
            $question->content = substr($question->content, 0, 140).' ...';
        }
        
        return view('page.home', ['questions' => $questions, 'leftConnector' => null]);
    }
}