<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['book_title', 'book_description', 'book_quantity', 'category_id', 'book_cover', 'book_file'];

    protected $with = ['category', 'user'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTakeBookCoverAttribute()
    {
        return '/storage/' . $this->book_cover;
    }
}
