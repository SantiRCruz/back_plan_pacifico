<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampleType extends Model
{
    protected $table = "sample_types";
    protected $primaryKey = "id_sample_type";

    public function analysis(){
        return $this->hasMany('App\Models\Sample','sample_type_id','id_sample_type');
    }
    public function parameter(){
        return $this->hasMany('App\Models\Parameter','sample_type_id','id_sample_type');
    }
}
