<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birthdate', 'gender', 'contact'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
