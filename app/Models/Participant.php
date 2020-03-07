<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Participant extends Model
{
    protected $guarded = [''];

    public static function boot() {
        parent::boot();

        static::deleting(function($data) {
            Storage::delete('qrcode/'.$data->flag.'.png');
            $files = Storage::files('e_certificates/'.$data->id);
            foreach ($files as $item) {
                Storage::delete($item);
            }    

            $data->job()->delete();                                
            $data->personality()->delete();                                
            $data->attendances()->delete();                                
        });
    }  

    public function job(){
    	return $this->hasOne('App\Models\ParticipantJob');
    }

    public function personality(){
    	return $this->hasOne('App\Models\ParticipantPersonality');
    }    

    public function attendances(){
    	return $this->hasMany('App\Models\ParticipantAttendance');
    }
}
