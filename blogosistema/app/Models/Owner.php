<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    public function ownerTasks() {
        return $this->hasMany(Task::class, 'owner_id', 'id');
    }
}
