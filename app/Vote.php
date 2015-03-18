<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model {
    
    protected $table = 'votes';
    
    protected $fillable = ['user_id', 'describes_type', 'describes_id', 'positive'];
    
    protected $hidden = ['id'];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function describes() {
        return $this->morphTo();
    }
    
    
}