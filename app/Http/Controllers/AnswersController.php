<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AnswersController extends Controller {

    public function showAnswers($id, $previous)
    {
        $theQ = Questions::findOrFail($id);
        $theAs = $theQ.getAnswers(); 
        
        
        //sort answers based upon rating
        for($i = 0; $i < sizeof($theAs); $i++) {
            for($j = $i + 1; $j < sizeof($theAs); $j++) {
                if($theAs[j].value > $theAs[i].value) {
                    $temp = $theAs[i];
                    $theAs[i] = $theAs[j];
                    $theAs[j] = $temp;
            }
        }
        
        $answerData = array(
            "answers" => $theAs,
            "backout" -> True,
            "leftConnector" => array(
               "type" => "q",
               "id" => $id
            )
        );
            
        return view('page.answers', $answerData);
    }

}