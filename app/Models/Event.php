<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;
use URL;

class Event extends Model
{
    protected $guarded = [''];

    protected $appends = ['image'];

    private function checkImageFolder($id){
        if(!Storage::exists('event_image/'.$id)){
            Storage::makeDirectory('event_image/'.$id, 777, true, true);            
        }
    }

    public function getImageAttribute()
    {
        $files = Storage::files('event_image/'.$this->id);
        if(count($files) == 0) return URL::asset('noimage.png');
        else return route('event.image', $this->id);
    }    

    public function setImageAttribute($value)
    {
        if($value == null) return false;
        $this->checkImageFolder($this->id);
        Storage::put('event_image/'.$this->id, $value);
    }  

    public function participants(){
        return $this->hasMany('App\Models\Participant');
    }
}
