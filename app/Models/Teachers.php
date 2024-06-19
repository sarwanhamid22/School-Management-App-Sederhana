<?php

// app/Models/Teacher.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Teachers extends Model
{
    
    use HasFactory, HasRoles;

    
    protected $fillable = [
        'name', 'teacher_id', 'specialization', 'phone_number', 'address', 'email', 'password', 'photo'
    ];

    // Relationship: Teacher has many teaching schedules
    public function teachingSchedules()
    {
        return $this->hasMany(TeachingSchedules::class);
    }

    // Relationship: Teacher has many subjects through teaching schedules
    public function subjects()
    {
        return $this->hasManyThrough(Subject::class, TeachingSchedules::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
