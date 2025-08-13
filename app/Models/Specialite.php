<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    
    protected $fillable = ['name'];

    /**
     * Get the medecins associated with the specialite.
     */
    public function medecins()
    {
        return $this->hasMany('App\Models\Medecin');
    }
}
