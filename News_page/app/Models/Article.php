<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    // $table->unsignedBigInteger('image_id');
    // $table->foreign('image_id')->references('id')->on('article_images');
    public function articleImages() {
        return $this->hasOne(ArticleImage::class, 'image_id', 'id');
    }
    public function articlesArticlecategory() {
        return $this->belongsTo(ArticleCategory::class, 'category_id', 'id');
    }
}
