<?php 
namespace App\Models;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model{
    use HasFactory;
    protected $fillable=['title','slug','id_penulis','content'];
    protected $with = ['author', 'category'];

    public function author(): BelongsTo{
        return $this->belongsTo(User::class, 'id_penulis');
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class,'id_category');
    }   

    public function scopeFilter(Builder $query, array $filter):void {

        $query->when(($filter['search']??false),function($query){
            $query->where('title', 'like', '%'.request('search').'%');
        });
        $query->when($filter['category'] ?? false, function($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filter['author'] ?? false, function( $query , $author){
            $query->whereHas('author', function($query) use($author){
                $query->where('username', $author);
            });
        });
        
    }
}

