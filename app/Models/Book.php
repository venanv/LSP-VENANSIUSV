<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow the Laravel conventions
    protected $table = 'books';

    // Define the fillable properties to allow mass assignment
    protected $fillable = [
        'title', 'author', 'stock', 'published_at', // add your book fields here
    ];

    /**
     * Define the relationship with the Loan model
     */
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
