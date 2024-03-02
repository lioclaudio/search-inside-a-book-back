<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookPage extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
