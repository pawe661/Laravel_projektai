<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    
    use HasFactory;

    use Sortable;

    public $sortable = ['id', 'title', 'description', 'category_editor' ] ;
    // $sortableAs reikia įrašyti tokį pavadinimą kokį meta iš dd() ryšio po withCount('categoryPosts')
    // leidžia rušiuoti stulpelius kurių nėra DB
    public $sortableAs = ['category_posts_count'];
    
    public function categoryPosts() {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
