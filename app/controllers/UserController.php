<?php

class UserController extends BaseController {

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function showProfile($user_id) {
        $theUser = User::findOrFail($user_id);
        return view('page.profile', ['user' => $theUser]);
	}
    
    public function addAvatar($user_id) {
        $file = array('image' => Input::file('image'));
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        
        $validator = Validator::make($file, $rules);
        
        if ($validator->fails()) {
            return Redirect::to('user/'.$user_id)->withInput()->withErrors($validator);
        } else {
            if (Input::file('image')->isValid()) {
                $destinationPath = 'avatars'; 
                
                $extension = Input::file('image')->getClientOriginalExtension(); 
                $fileName = Auth::user()->name.'.'.$extension; 
                
                Input::file('image')->move($destinationPath, $fileName);
                
                Session::flash('success', 'Upload successfully'); 
                return Redirect::to('user/'.$user_id);
            } else {
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('user/'.$user_id);
            }
        }
    }
}
