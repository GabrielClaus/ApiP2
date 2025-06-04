<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = 'books';
    protected $fillable = ["title","synopsis"];

    public function booksgenres(){
        return $this->belongsToMany(BookGenres::class, 'books_genere','books_id','booksgeneres_id');
    }

    public function author(){
        return $this->belongsTo(Author::class, 'author_book','books_id','author_id');
    }

    public function review(){
        return $this->hasMany(Review::class, 'review_book', 'books_id', 'review_id');
    }
}

