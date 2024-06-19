<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    protected $fillable = ['student_id', 'subject_id', 'grade'];

    // Relationship: Grade belongs to a student
    public function student()
    {
        return $this->belongsTo(Students::class);
    }

    // Relationship: Grade belongs to a subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
