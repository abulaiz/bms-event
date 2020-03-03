<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;
use URL;

class Event extends Model
{
    protected $guarded = [''];

    protected $appends = ['image', 'status'];

    public static function boot() {
        parent::boot();

        static::deleting(function($event) {
            $files = Storage::files('event_image/'.$event->id);
            foreach ($files as $item) {
                Storage::delete($item);
            }  
            $files = Storage::files('event_nametags/'.$event->id);
            foreach ($files as $item) {
                Storage::delete($item);
            }                        
        });
    }       

    private function checkImageFolder($id){
        if(!Storage::exists('event_image/'.$id)){
            Storage::makeDirectory('event_image/'.$id, 777, true, true);            
        }
    }

    public function getImageAttribute()
    {
        $files = Storage::files('event_image/'.$this->id);
        if(count($files) == 0) return URL::asset('noimage.jpg');
        else return route('event.image', $this->id);
    }    

    public function getStatusAttribute(){
        $now = strtotime( date('Y-m-d') );
        if( $now > strtotime($this->ended_date) )
            return 3; // Selesai
        elseif($now < strtotime($this->started_date))
            return 2; // Cooming Soon
        else
            return 1; // Berlangsung        
    }

    public function setImageAttribute($value)
    {
        if($value == null) return false;
        $this->checkImageFolder($this->id);
        $files = Storage::files('event_image/'.$this->id);
        foreach ($files as $item) {
            Storage::delete($item);
        }
        Storage::put('event_image/'.$this->id, $value);
    }  

    public function participants(){
        return $this->hasMany('App\Models\Participant');
    }
}
