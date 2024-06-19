<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name_subjects', 'class_id', 'teacher_id'];

    // Relationship to Class model
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    // Relationship to Teacher model
    public function teacher()
    {
        return $this->belongsTo(Teachers::class, 'teacher_id');
    }
}
