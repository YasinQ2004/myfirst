<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    // Define the inverse relationship with Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
