<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_point', 'end_point', 'stops', 'bus_id'];

    // خط سير مرتبط بباصات
    public function bus()
{
    return $this->belongsTo(Bus::class);
}

}
