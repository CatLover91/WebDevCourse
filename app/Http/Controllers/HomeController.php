<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function index() {
        $questions = Question::ordered()->getPage(0);
        
        foreach($questions as $question) {
            $question->content = substr($question->content, 0, 140).' ...';
        }
        
        return view('page.home', ['questions' => $questions]);
    }
}