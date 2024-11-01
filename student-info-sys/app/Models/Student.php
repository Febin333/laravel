<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age', 'gender', 'class_id'];

    public function classModel()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
}
