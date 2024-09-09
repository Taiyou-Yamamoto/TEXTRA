<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'type',
        'content',
        'page_number',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
