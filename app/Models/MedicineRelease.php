<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineRelease extends Model
{
    use HasFactory;

    protected $fillable = ['appointment_id', 'medicine_id', 'quantity_released'];

    // MedicineRelease belongs to an Appointment
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    // MedicineRelease belongs to a Medicine
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
