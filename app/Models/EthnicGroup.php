<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EthnicGroup extends Model
{
    protected $table = 'ethnic_groups';
    protected $primaryKey = 'id_ethnic_group';

  

    public function populationEthnic(){
        return $this->hasMany('App\Models\population_ethnic','ethic_group_id','id_ethic_group');
    }
}
