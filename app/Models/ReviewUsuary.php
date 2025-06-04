<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewUsuary extends Model
{
    protected $primarykey = "usuary";
    protected $table = ["name", "email", "password"];

    public function Review(){
        return $this->hasMany(Review::class, "review_usuary", "usuary_id", "review_id" );
    }
}
