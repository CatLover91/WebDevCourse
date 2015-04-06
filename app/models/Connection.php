<?php

class Connection extends Eloquent {
    
    protected $table = 'connections';
    
    protected $fillable = ['question_id', 'tag_id'];
    
    protected $hidden = ['id'];
    
    public function tags() {
        return $this->belongsTo('App\models\Tag');
    }
    
    public function questio() {
        return $this->belongsTo('App\models\Question');
    }
    
}