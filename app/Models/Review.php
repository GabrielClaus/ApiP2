<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $primarykey = "review";
    protected $fillable = [
        'rating',
        'comment',
        'book_id',
        'usuary_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    public function usuary(){
        return $this->belongsTo(ReviewUsuary::class, "usuary_reviews", "review_id", "usuary_id");
    }

}
