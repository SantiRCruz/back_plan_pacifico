<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
    protected $table = "measures";
    protected $primaryKey = "id_measure";

    public function sample(){
        return $this->belongsTo('App\Models\Samples','sample_id','id_sample');
    }
}
