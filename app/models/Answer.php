<?php

class Answer extends Eloquent {
    
    protected $table = 'answers';
    
    protected $fillable = ['user_id', 'question_id', 'title', 'content', 'value', 'best'];
    
    protected $hidden = ['id'];
    
    public function user() {
        return $this->belongsTo('App\models\User');
    }
    
    public function question() {
        return $this->belongsTo('App\models\Question');
    }
    
    public function votes() {
        return $this->morphMany('App\models\Vote', 'describes');
    }
    
    //get answers by value
    public function scopeOrdered($query) {
        return $query->orderBy('value', 'desc')->orderBy('best', 'desc');
    }
}
