<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    protected $table = "populations";
    protected $primaryKey = 'id_population';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function populatedCenter(){
        return $this->belongsTo('App\Models\PopulatedCenter','populated_center_id','id_populated_center');
    }
    public function ethinicGroup(){
        return $this->belongsTo('App\Models\EthinicGroup','ethnic_group_id','id_ethnic_group');
    }
    public function populationType(){
        return $this->belongsTo('App\Models\PopulationType','population_type_id','id_population_type');
    }
    public function analysis(){
        return $this->hasMany('App\Models\Sample','population_id','id_population');
    }
}
