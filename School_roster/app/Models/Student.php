<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function studentGroup() {
        return $this->belongsTo(AttendanceGroup::class, 'group_id', 'id');
    }
}
