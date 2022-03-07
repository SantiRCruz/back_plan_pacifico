<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'Departments';
    protected $primaryKey = 'id_department';


    public function municipality(){
        return $this->hasMany('App\Models\Municipality','department_id','id_department');
    }
}
