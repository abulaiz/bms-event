<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $guarded = [''];

    public function job(){
    	return $this->hasOne('App\Models\ParticipantJob');
    }

    public function personality(){
    	return $this->hasOne('App\Models\ParticipantPersonality');
    }    
}
