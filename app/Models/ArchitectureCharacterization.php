<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchitectureCharacterization extends Model
{
    protected $table = "characterization";
    protected $primaryKey = "id_characterization";


    public function architecture(){
        return $this->belongsTo('App\Models\Architecture','architecture_id','id_architecture');
    }


    public function multipleResponseCharacterization(){
        return $this->hasMany('App\Models\MultipleResponseCharacterization','characterization_id','id_characterization');
    }
}
