<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopulationCenters extends Model
{
    protected $table = 'population_centers';
    protected $primaryKey = 'id_populated_center';


    public function municipality(){
        return $this->belongsTo('App\Models\Municipality','municipality_id','id_municipality');
    }
    public function population(){
        return $this->hasMany('App\Models\Population','populated_center_id','id_populated_center');
    }

}
