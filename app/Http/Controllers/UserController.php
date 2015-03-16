<?php namespace App\Http\Controllers;

class ProfileController extends Controller {

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function showProfile($id)
	{
        $theU = DB::table('users')->where('id', $id)->first();
        $profileData = array(
            
        );
		return view('pages.profile', $profileData);
	}
    
    public function addAvatar($id)
    {
        
    }

}
