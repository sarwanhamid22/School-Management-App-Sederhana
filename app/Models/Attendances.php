<?php

// app/Models/Attendance.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    protected $fillable = ['student_id', 'date', 'status'];

    // Relationship: Attendance belongs to a student
    public function student()
    {
        return $this->belongsTo(Students::class);
    }
}
