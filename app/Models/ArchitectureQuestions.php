<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchitectureQuestions extends Model
{
    protected $table = "architecture_questions";
    protected $primaryKey = "id_architecture_questions";

    public function architectureObservation(){
        return $this->belongsTo('App\Models\MultipleArchitectureObservation','architecture_questions_id','id_architecture_questions');
    }

    public function multipleResponsecharacterization(){
        return $this->belongsTo('App\Models\ArchitectureQuestions','architecture_questions_id','id_architecture_questions');
    }
}
