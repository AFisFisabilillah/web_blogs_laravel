<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = "category";
    use HasFactory;
    protected $fillable = ['id','name', 'slug'];

    public function blogsCategory():HasMany{
        return $this->hasMany(Post::class,'id_category');
    }
}
