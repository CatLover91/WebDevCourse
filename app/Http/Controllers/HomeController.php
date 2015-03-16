<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

    
    public function index()
    {
        $theQs => DB::table('questions')
            ->orderBy('value', 'desc')
            ->take(7);
        
        for($i = 0; $i < 7; $i++)
        {
            $theQs[$i]['content'] = substr(var_dump($theQs[$i]->content), 0, 140).' ...';
        }
        
        return view('page.home', $theQs);
    }

}