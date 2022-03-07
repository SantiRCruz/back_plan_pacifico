<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = "results";
    protected $primaryKey = "id_result";

    public function analysis(){
        return $this->belongsTo('App\Models\Parameter','analysis_id','id_analysis');
    }
    public function parameter(){
        return $this->belongsTo('App\Models\Parameter','parameter_id','id_parameter');
    }
}
