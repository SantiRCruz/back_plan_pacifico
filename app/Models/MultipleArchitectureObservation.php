<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleArchitectureObservation extends Model
{
    protected $table = "multiple_architecture_observation";
    protected $primaryKey = "id_multiple_architecture_observation";



    public function architectureObservationResponse(){
        return $this->hasMany('App\Models\MultipleArchitectureObservationResponse','multiple_architecture_observation_id','id_multiple_architecture_observation');
    }

    public function architectureObservation(){
        return $this->belongsTo('App\Models\Architecture','architecture_observation_id','id_architecture_observation');
    }

    public function architectureQuiestions(){
        return $this->hasMany('App\Models\ArchitectureQuestions','architecture_questions_id','id_architecture_questions');
    }
}
