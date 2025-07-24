<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'nom',
        'date_naissance',
        'genre',
        'telephone',
        'adresse',
    ];

    protected $casts = [
        'date_naissance' => 'date',
    ];
    
    public function getAgeAttribute()
    {
        return now()->diffInYears($this->date_naissance);
    }
}