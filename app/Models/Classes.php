<?php

// app/Models/Classes.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = ['name', 'description', 'teacher_id'];

    // Relationship: Class belongs to a teacher
    public function teacher()
    {
        return $this->belongsTo(Teachers::class);
    }

    // Relationship: Class has many subjects
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    // Relationship: Class has many students
    public function students()
    {
        return $this->hasMany(Students::class);
    }
}
