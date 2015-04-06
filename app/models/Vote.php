<?php

class Vote extends Eloquent {
    
    protected $table = 'votes';
    
    protected $fillable = ['user_id', 'describes_type', 'describes_id', 'positive'];
    
    protected $hidden = ['id'];
    
    public function user() {
        return $this->belongsTo('App\models\User');
    }
    
    public function describes() {
        return $this->morphTo();
    }
    
    
}
