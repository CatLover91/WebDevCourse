<?php

class Tag extends Eloquent {
    
    protected $table = 'tags';
    
    protected $fillable = ['content'];
    
    protected $hidden = ['id'];
    
    public function connections() {
        return $this->hasMan('App\models\Connection');
    }
    
}