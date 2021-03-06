<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profiles";
    protected $primaryKey = "id_profile";

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function user()
    {
        return $this->hasMany('App\Models\User', 'profile_id', 'id_profile');
    }

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
