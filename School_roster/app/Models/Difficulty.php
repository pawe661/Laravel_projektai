<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    use HasFactory;

    public function dificultyGroups() {
        return $this->hasMany(AttendanceGroup::class, 'difficulty_id', 'id');
    }
}
