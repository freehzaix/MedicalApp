<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeExamen extends Model
{
    
    protected $fillable = ['departement_id', 'libelle'];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
    
}
