<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceGroup extends Model
{
    use HasFactory;

    public function groupStudents() {
        return $this->hasMany(Student::class, 'group_id', 'id');
    }
    public function groupSchool() {
        return $this->belongsTo(School::class, 'school_id', 'id');
    }
    public function groupDifficulty() {
        return $this->belongsTo(Difficulty::class, 'difficulty_id', 'id');
    }
}
