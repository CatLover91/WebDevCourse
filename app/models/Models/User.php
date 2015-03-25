<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
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
	protected $hidden = ['password', 'id'];//'remember_token']; 
    
    public function questions() {
        return $this->hasMany('App\Question');
    }
    
    public function answers() {
        return $this->hasMany('App\Answer');
    }
    
    public function votes() {
        return $this->hasMany('App\Vote');
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
