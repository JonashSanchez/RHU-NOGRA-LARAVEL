<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'appointment_date', 'reason'];

    // Appointment has many Medicine Releases
    public function medicineReleases()
    {
        return $this->hasMany(MedicineRelease::class);
    }

    // Appointment belongs to a Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
