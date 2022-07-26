<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleResponseCharacterizationData extends Model
{
    protected $table = "multiple_responses_characterization_data";
    protected $primaryKey = "id_multiple_responses_characterization_data";


    public function multipleResponseCharacterization(){
        return $this->belongsTo('App\Models\MultipleResponseCharacterization','multiple_response_characterization_id','id_multiple_response_characterization');
    }
}
