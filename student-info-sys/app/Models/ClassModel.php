<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassModel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'teacher', 'schedule'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
