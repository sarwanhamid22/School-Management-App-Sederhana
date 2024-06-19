<?php

// app/Models/Student.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Students extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name', 'student_id', 'class_id', 'birth_date', 'address', 'phone_number', 'email', 'password', 'photo', 'user_id'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    // Relationship: Student belongs to a class
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    // Relationship: Student has many attendances
    public function attendances()
    {
        return $this->hasMany(Attendances::class);
    }

    // Relationship: Student has many grades
    public function grades()
    {
        return $this->hasMany(Grades::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
