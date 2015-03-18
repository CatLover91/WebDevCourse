<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
    
    protected $table = 'answers';
    
    protected $fillable = ['user_id', 'question_id', 'title', 'content', 'value', 'best'];
    
    protected $hidden = ['id'];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function question() {
        return $this->belongsTo('App\Question');
    }
    
    public function votes() {
        return $this->morphMany('App\Vote', 'describes');
    }
    
    //get answers by value
    public function scopeOrdered($query) {
        return $query->orderBy('value', 'desc')->orderBy('best', 'desc');
    }
}