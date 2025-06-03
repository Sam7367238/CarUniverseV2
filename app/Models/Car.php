<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "image"
    ];

    public function user() : BelongsTo {
        return $this -> belongsTo(User::class);
    }

    public function comments() : HasMany {
        return $this -> hasMany(Comment::class);
    }
}
