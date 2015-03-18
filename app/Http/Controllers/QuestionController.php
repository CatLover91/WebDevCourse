<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class QuestionController extends Controller {

    
    public function showQuestion($id) {
        
    }
    
    public function addQuestion() {
        $question = new Question(['title' => Input::text('title'), 'content' => Input::textarea('content')]);
        
        $user = Auth::user();
        
        $question = $user->questions()->save($question);
    }
            
    public function upVote($question_id) {
        $vote = new Vote(['positive' = 'true']);
        
        $question = Question::find($question_id);
        $user = Auth::user();
        
        $vote = $user->votes()->save($vote);
        $vote = $question->votes()->save($vote);
    }
            
    public function downVote($question_id) {
        $vote = new Vote(['positive' = 'false']);
        
        $question = Question::find($question_id);
        $user = Auth::user();
        
        $vote = $user->votes()->save($vote);
        $vote = $question->votes()->save($vote);
    }
            
    public function removeVote($question_id) {
        $vote = Answer::find($answer_id)->votes()->where('user_id', '=', Auth::user()->id)->first();
        
        $vote->delete();
    }
                        
    public function changeVote($question_id) {
        $vote = Question::find($question_id)->votes()->where('user_id', '=', Auth::user()->id)->first();
        
        $vote->positive = ! vote->positive;
        
        $vote->save();
    }
}