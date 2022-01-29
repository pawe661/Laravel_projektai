<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{

    use HasFactory;
    public function articlecategoryArticles() {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }
}
