<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    protected $table = "analysis";
    protected $primaryKey = "id_analysis";

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id_user');
    }
    public function population(){
        return $this->belongsTo('App\Models\Population','population_id','id_population');
    }
    public function sampleType(){
        return $this->belongsTo('App\Models\SampleType','sample_type_id','id_sample_type');
    }
    public function waterType(){
        return $this->belongsTo('App\Models\User','water_type_id','id_water_type');
    }
    public function sample(){
        return $this->hasMany('App\Models\Sample','analysis_id','id_analysis');
    }
    public function result(){
        return $this->hasMany('App\Models\Result','analysis_id','id_analysis');
    }
}
