<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $primarykey = "author";
    protected $teble = ["name", "dateofbith", "biography"];

    public function books(){
        return $this->hasMany(Book::class, 'books_author','author_id','books_id');
    }
}
