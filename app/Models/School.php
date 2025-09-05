<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone'];

    // مدرسة عندها طلاب
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
