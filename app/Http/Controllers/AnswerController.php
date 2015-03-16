<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AnswerController extends Controller {
    
    public function addAnswer($question_id)
    {
        
    }
    
    public function getAnswers($question_id)
    {
        $theAs = DB::table('answers')
            ->where('asked_id', $question_id)
            ->orderBy('value', 'desc')
            ->get();
            
        return $theAs;
    }
    
    public function markBest($question_id, $answer_id)
    {
        DB::transaction(function() {
            DB::table('questions')->where('id', $question_id)->update(['best_id' => $answer_id]);
            DB::table('answers')->where('id', $answer_id)->update(['best' => 1]);
        });
    }
    
    public function removeBest($question_id, $answer_id)
    {
        DB::transaction(function() {
            DB::table('answers')->where('id', $answer_id)->update(['best' => 0]);
            DB::table('questions')->where('id', $question_id)->update(['best_id' => null]);
        });
    }
    
    public function upVote($question_id, $answer_id)
    {
        
    }
    
    public function downVote($question_id, $answer_id)
    {
        
    }
    
    public function removeVote($question_id, $answer_id)
    {
        
    }
}