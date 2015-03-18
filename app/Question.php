<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
    
    protected $table = 'questions';
    
    protected $fillable = ['asker_id', 'titlee', 'content', 'best_id', 'value'];
    
    protected $hidden = ['id'];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function answers() {
        return $this->hasMany('App\Answer');
    }
    
    public function best() {
        return $this->hasOne('App\Answer', 'question_id', 'best_id');
    }
    
    public function votes() {
        return $this->morphMany('App\Vote', 'describes');
    }
    
    //get questions by value
    public function scopeOrdered($query) {
        return $query->orderBy('value', 'desc');
    }
    
    //return a section of 5 questions
    public function scopeGetPage($query, $page) {
        $counter = 0;
        $query->chunk(5, function($questions) {
            if($counter === $page) {
                return $questions;    
            }
        });
    }
}