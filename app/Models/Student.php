<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'guardian_id', 'school_id', 'bus_id'];

    // الطالب يتبع ولي أمر
    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    // الطالب يتبع مدرسة
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    // الطالب يركب باص
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
