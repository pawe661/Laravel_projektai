<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{

    use HasFactory;

    public function imagesArticle() {
        return $this->hasOne(Article::class, 'image_id', 'id');
    }
}
