<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookGenres extends Model
{
    //
    protected $table = "booksgenres";
    protected $fillable = ['name'];

    public function books(){
        return $this->belongsToMany(Book::class,'book_genre','booksgenre_id','book_id');
    }
}
