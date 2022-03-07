<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterType extends Model
{
    protected $table = "water_types";
    protected $primaryKey = "id_water_type";


    public function analysis(){
        return $this->hasMany('App\Models\Sample','water_type_id','id_water_type');
    }
}
