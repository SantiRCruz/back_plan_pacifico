<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = "parameters";
    protected $primaryKey = "id_parameter";


    public function feauture(){
        return $this->belongsTo('App\Models\Feature','feature_id','id_feature');
    }
    public function sampleType(){
        return $this->belongsTo('App\Models\SampleType','sample_type_id','id_sample_type');
    }
    public function result(){
        return $this->hasMany('App\Models\Result','result_id','id_result');
    }
    public function sample(){
        return $this->hasMany('App\Models\Sample','sample_id','id_sample');
    }
}
