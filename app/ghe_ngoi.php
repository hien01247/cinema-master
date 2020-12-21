<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ghe_ngoi extends Model
{
    //
    protected $table = "ghe_ngoi";

    // public function rap_chieu(){
    //     return $this->belongsTo('App\rap_chieu','marap','maghe');
    // }

    public function ve(){
        return $this->belongsTo('App\ve','maghe','maghe');
    }

    public function suat_chieu(){
        return $this->belongsTo('App\suat_chieu','masuatchieu','masuatchieu');
    }

    public function loai_ghe(){
        return $this->belongsTo('App\loai_ghe','tenloai','maghe');
    }

}
