<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'start_point', 'end_point', 'stops'];

    // خط سير مرتبط بباصات
    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
}
