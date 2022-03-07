<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $table = "samples";
    protected $primaryKey = "id_sample";

    public function parameter(){
        return $this->belongsTo('App\Models\Parameter','parameter_id','id_parameter');
    }
    public function analysis(){
        return $this->belongsTo('App\Models\Analysis','analysis_id','id_analysis');
    }

    public function measure(){
        return $this->hasMany('App\Models\Measure','measure_id','id_measure');
    }
}
