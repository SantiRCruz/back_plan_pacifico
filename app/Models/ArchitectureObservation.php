<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchitectureObservation extends Model
{
    protected $table = "architecture_observation";
    protected $primaryKey = "id_architecture_observation";

    public function architecture(){
        return $this->belongsTo('App\Models\Architecture','architecture_id','id_architecture');
    }
    
    public function architectureMultipleObservation(){
        return $this->hasMany('App\Models\MultipleArchitectureObservation','architecture_observation_id','id_architecture_observation');
    }

    
}
