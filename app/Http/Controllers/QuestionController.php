<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class QuestionController extends Controller {

    
    public function showQuestion($id)
    {
        $theQ => DB::table('questions')->where('id', $id)->first();
        $theAu => DB::table('users')->where('id', $theQ->asker_id)->first();
        $theAs = DB::table('answers')
            ->where('asked_id', $question_id)
            ->orderBy('value', 'desc')
            ->get();
        if(Storage::exists("avatars/".$theAu->id.".jpg"))
        {
            $ava = true;
            $loc = "avatars/".$theAu->id.".jpg";
        } else {
            $ava = false;
            $loc = null;
        }
        $questionData = array(
            'question' => array(
                'title' => $theQ->title,
                'content' => $theQ->content,
                'value' => $theQ->value
            ),
            'author' => array(
                'id' => $theAu->id,
                'name' => $theAu->name,
                'hasAvatar' => $ava,
                'imageLocation' => $loc,
            ),
            'answers' => $theAs
        ];
        $answerData = array(
            "answers" => $theAs,
            "backout" => True
            )
        return view('page.question', $questionData);
    }
    
    public function addQuestion()
    {
        DB::insert('insert into questions (asker_id, title, content) values (?, ?, ?)', [Auth::user()->id, 'Dayle']);
    }
            
    public function upVote($question_id)
    {
        $myid = Auth::user()->id
        DB::transaction(function()
        {
            
            
        }
    }
            
    public function downVote($question_id)
    {
        $myid = Auth::user()->id
        
    }
            
    public function removeVote($question_id)
    {

    }

}