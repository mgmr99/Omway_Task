<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_News extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','news_id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'id', 'id');
    }

    public function news()
    {
        return $this->belongsToMany(News::class, 'id', 'id');
    }
}
