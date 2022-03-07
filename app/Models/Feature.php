<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = "features";
    protected $primaryKey = "id_feature";


    public function parameter(){
        return $this->hasMany('App\Models\Parameter','parameter_id','id_parameter');
    }
}
