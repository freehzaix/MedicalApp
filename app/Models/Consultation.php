<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'medecin_id',
        'patient_id',
        'service_id',
        'prix',
        'notes',
        'date_consultation'
    ];

    protected $casts = [
        'date_consultation' => 'datetime', // => sera un Carbon
    ];

    public function medecin() {
        return $this->belongsTo(Medecin::class);
    }

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
