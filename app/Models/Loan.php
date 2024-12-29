<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow the Laravel conventions
    protected $table = 'loans';

    // Define the fillable properties to allow mass assignment
    protected $fillable = [
        'member_id',
        'book_id',
        'loan_date',
        'due_date',
    ];

    /**
     * Define the relationship with the Member model
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    /**
     * Define the relationship with the Book model
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
