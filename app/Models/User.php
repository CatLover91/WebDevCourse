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
        return if(Storage::exists('avatars/'.this->name.'.jpeg') && Storage::exists('avatars/'.this->name.bmp'.') && Storage::exists('avatars/'.this->name.'.png'));
    }
    
    public function avatar() {
        if(Storage::exists('avatars/'.this->name.'.jpeg'))
            return 'avatars/'.this->name.'.jpeg';
        } elseif(Storage::exists('avatars/'.this->name.bmp'.')
             return 'avatars/'.this->name.'.bmp';
        }  else {
             return 'avatars/'.this->name.'.png';
        }
    }
                 
    public function votedOn($QorA) {
        return $QorA->votes()->where('user_id', '=', [this->id])->first();
    }
}
