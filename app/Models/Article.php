<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'slug', 'writer', 'image', 'content', 'status', 'meta_title', 'meta_keywords', 'meta_description'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
