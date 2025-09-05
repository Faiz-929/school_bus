<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = ['plate_number', 'capacity', 'driver_id', 'bus_route_id'];

    // الباص له سائق
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    // الباص على خط سير
    public function busRoute()
    {
        return $this->belongsTo(BusRoute::class);
    }

    // الباص عنده طلاب
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
