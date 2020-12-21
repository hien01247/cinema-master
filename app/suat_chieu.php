<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class suat_chieu extends Model
{
    protected $table = "suat_chieu";

    public function phim(){
        return $this->belongsTo('App\phim','maphim','masuatchieu');
    }

    public function khung_gio(){
        return $this->belongsTo('App\khung_gio','makhunggio','masuatchieu');
    }

    public function ve(){
        return $this->belongsTo('App\ve','masuatchieu','masuatchieu');
    }

    public function ghe(){
        return $this->hasMany('App\suat_chieu','masuatchieu','masuatchieu');
    }
}
