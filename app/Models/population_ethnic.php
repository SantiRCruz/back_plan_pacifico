<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class population_ethnic extends Model
{
    use HasFactory;


    protected $table = 'population_ethnics';
    protected $primaryKey = 'id_population_ethnics';


    public function ethinicGroup(){
        return $this->belongsTo('App\Models\EthinicGroup','ethnic_group_id','id_ethnic_group');
    }

    public function populations(){
        return $this->belongsTo('App\Models\Population','populations_id','id_population');
    }
    
}
