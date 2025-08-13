<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

    protected $table = 'rendezvous';

    protected $fillable = [
        'patient_id',
        'medecin_id',
        'date_rdv',
        'heure_rdv',
        'motif',
    ];

    /**
     * Relation : Un rendez-vous appartient à un patient
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Relation : Un rendez-vous appartient à un médecin
     */
    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }
}
