<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'quantity', 'expiry_date'];

    // Medicine has many Medicine Releases
    public function medicineReleases()
    {
        return $this->hasMany(MedicineRelease::class);
    }
}
