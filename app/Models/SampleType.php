<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleType extends Model
{
    protected $table = "sample_types";
    protected $primaryKey = "id_sample_type";

    public function analysis(){
        return $this->hasMany('App\Models\Sample','analysis_id','id_analysis');
    }
    public function parameter(){
        return $this->hasMany('App\Models\Parameter','parameter_id','id_parameter');
    }
}
