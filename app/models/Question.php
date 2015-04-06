<?php

class Question extends Eloquent {
    
    protected $table = 'questions';
    
    protected $fillable = ['asker_id', 'titlee', 'content', 'best_id', 'value'];
    
    protected $hidden = ['id'];
    
    public function user() {
        return $this->belongsTo('App\models\User');
    }
    
    public function answers() {
        return $this->hasMany('App\models\Answer');
    }
    
    public function best() {
        return $this->hasOne('App\models\Answer', 'question_id', 'best_id');
    }
    
    public function votes() {
        return $this->morphMany('App\models\Vote', 'describes');
    }
    
    public function connections() {
        return $this->hasMany('App\models\Connection');
    }
    
    //get questions by value
    public function scopeOrdered($query) {
        return $query->orderBy('value', 'desc');
    }
    
    //return a section of 5 questions
    public function scopeGetPage($query, $page) {
        $counter = 0;
        $query->orderBy('value', 'desc')->chunk(5, function($questions) {
            if($counter === $page) {
                return $questions;    
            }
        });
    }
}
