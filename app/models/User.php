<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'id', 'admin'];//'remember_token']; 
    
    public function questions() {
        return $this->hasMany('App\models\Question');
    }
    
    public function answers() {
        return $this->hasMany('App\models\Answer');
    }
    
    public function votes() {
        return $this->hasMany('App\models\Vote');
    }
    
    public function hasAvatar() {
        
        $name = 'blah';
        if(Storage::exists('avatars/'.$name.'.jpeg') && Storage::exists('avatars/'.$name.'.bmp') && Storage::exists('avatars/'.$name.'.png')) {
            return true;
        } else {
            return false;
        }
    }
    
    public function avatar() {
        $name = 'blah';
        if(Storage::exists('avatars/'.$name.'.jpeg')) {
            return 'avatars/'.$name.'.jpeg';
        } elseif(Storage::exists('avatars/'.$name.'.bmp')) {
             return 'avatars/'.$name.'.bmp';
        }  else {
             return 'avatars/'.$name.'.png';
        }
    }
                 
    public function votedOn($QorA) {
        $id = 'blah';
        return $QorA->votes()->where('user_id', '=', $id)->first();
    }

}
