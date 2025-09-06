<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{

    protected $fillable = ['name'];

    public function medecins()
    {
        return $this->hasMany(User::class);
    }
    
}
