<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class QuestionController extends Controller {

    
    public function showQuestion($id)
    {
        $theQ => Questions::findOrFail($id)
        $questionData = [
            'Title' => 
            'Content' =>
            'Value' =>
            'Author' =>
            'hasProfile' =>
            'imageLocation' =>
        ];
        return view('page.question', $questionData);
    }

}