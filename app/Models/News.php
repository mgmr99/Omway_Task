<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['id','category_id','title','slug','date','description','image','is_publish'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'id', 'id');
    }
}
