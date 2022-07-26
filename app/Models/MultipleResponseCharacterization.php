<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleResponseCharacterization extends Model
{
    protected $table = "multiple_response_characterization";
    protected $primaryKey = "id_multiple_response_characterization";

    public function characterization(){
        return $this->belongsTo('App\Models\ArchitectureCharacterization','characterization_id','id_characterization');
    }

    public function multipleresponsecharacterizationdata(){
        return $this->hasMany('App\Models\MultipleResponseCharacterizationData','multiple_response_characterization_id','id_multiple_response_characterization');
    }

    public function architecturequestions(){
        return $this->hasMany('App\Models\ArchitectureQuestions','architecture_questions_id','id_architecture_questions');
    }


}
