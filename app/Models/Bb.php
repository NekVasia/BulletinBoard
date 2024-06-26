<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bb extends Model
{
    protected $fillable = ['title', 'content', 'price', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
