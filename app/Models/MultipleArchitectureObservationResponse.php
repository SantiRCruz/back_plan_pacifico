<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleArchitectureObservationResponse extends Model
{
    protected $table = "multiple_architecture_observation_response";
    protected $primaryKey = "id_multiple_architecture_observation_response";

    public function architectureObservationResponse(){
        return $this->hasMany('App\Models\MultipleArchitectureObservation','multiple_architecture_observation_id','id_multiple_architecture_observation');
    }
}
