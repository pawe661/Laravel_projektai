<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory;
    public function taskStatusTasks() {
        return $this->hasMany(Task::class, 'status_id', 'id');
    }
}
