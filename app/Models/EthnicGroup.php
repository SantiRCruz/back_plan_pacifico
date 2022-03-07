<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EthnicGroup extends Model
{
    protected $table = 'ethnic_groups';
    protected $primaryKey = 'id_ethnic_group';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function population(){
        return $this->hasMany('App\Models\Population','population_id','id_population');
    }
}
