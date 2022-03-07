<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopulationType extends Model
{
    protected $table = "population_types";
    protected $primaryKey = 'id_population_type';



    public function population(){
        return $this->hasMany('App\Models\Population','population_type_id','id_population_type');
    }
}
