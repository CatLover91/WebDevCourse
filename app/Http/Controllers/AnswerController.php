<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AnswerController extends Controller {
    
    public function addAnswer($question_id)
    {
        $answer = new Answer(['title' => Input::text('title'), 'content' => Input::textarea('content')]);
        $question = Question::find($question_id);
        $user = Auth::user();
        
        $answer = $question->answers()->save($answer);
        $answer = $user->answers()->save($answer);
    }
    
    public function markBest($question_id, $answer_id) {
        $question = Question::find($question_id);
        $answer = Answer::find($answer_id);
        
        $answer->best = true;
        
        $answer = $question->best()->save($answer);
    }
    
    public function removeBest($question_id, $answer_id) {
        $question = Question::find($question_id);
        $answer = Answer::find($answer_id);
        
        $answer->best = false;
        
        $question->best_id = 0;
        
        $answer->save();
        $question->save();
    }
    
    public function upVote($question_id, $answer_id) {
        $vote = new Vote(['positive' = 'true']);
        
        $answer = Answer::find($answer_id);
        $user = Auth::user();
        
        $vote = $user->votes()->save($vote);
        $vote = $answer->votes()->save($vote);
    }
    
    public function downVote($question_id, $answer_id) {
        $vote = new Vote(['positive' = 'false']);
        
        $answer = Answer::find($answer_id);
        $user = Auth::user();
        
        $vote = $user->votes()->save($vote);
        $vote = $answer->votes()->save($vote);
    }
    
    public function removeVote($question_id, $answer_id) {
        $vote = Answer::find($answer_id)->votes()->where('user_id', '=', Auth::user()->id)->first();
        
        $vote->delete();
    }
    
    public function changeVote($question_id, $answer_id) {
        $vote = Answer::find($answer_id)->votes()->where('user_id', '=', Auth::user()->id)->first();
        
        $vote->positive = ! vote->positive;
        
        $vote->save();
    }
}