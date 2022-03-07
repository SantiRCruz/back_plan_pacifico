<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EthnicGroup extends Model
{
    protected $table = 'ethnic_groups';
    protected $primaryKey = 'id_ethnic_group';

    public function population(){
        return $this->hasMany('App\Models\Population','ethnic_group_id','id_ethnic_group');
    }
}
