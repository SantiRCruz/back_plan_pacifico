<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $table = 'municipalities';
    protected $primaryKey = 'id_municipality';


    public function department(){
        return $this->belongsTo('App\Models\Department','department_id','id_department');
    }
    public function populatedCenter(){
        return $this->hasMany('App\Models\PopulationCenters','municipality_id','id_municipality');
    }
}
