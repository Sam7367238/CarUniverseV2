<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = [
        "comment",
        "rating",
        "user_id"
    ];

    public function user() {
        return $this -> belongsTo(User::class);
    }

    public function car() {
        return $this -> belongsTo(Car::class);
    }
}
