<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'user_id',
        'liked',
    ];

    // One product belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
