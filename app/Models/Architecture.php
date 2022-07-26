<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Architecture extends Model
{
    protected $table = "architecture";
    protected $primaryKey = "id_architecture";

    
    public function populations(){
        return $this->belongsTo('App\Models\Population','population_id','id_population');
    }

    public function architectureObservation(){
        return $this->hasMany('App\Models\ArchitectureObservation','architecture_id','id_architecture');
    }

    public function characterization(){
        return $this->hasMany('App\Models\ArchitectureCharacterization','architecture_id','id_architecture');
    }
}
