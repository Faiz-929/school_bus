<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'license_number', 'email'];

    // سائق يقود باص
    public function bus()
    {
        return $this->hasOne(Bus::class);
    }
}
