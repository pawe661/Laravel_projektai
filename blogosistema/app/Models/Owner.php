<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Owner extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = ['id', 'name', 'surname', 'email', 'phone', ] ;
    public $sortableAs = ['owner_tasks_count'];

    public function ownerTasks() {
        return $this->hasMany(Task::class, 'owner_id', 'id');
    }
}
