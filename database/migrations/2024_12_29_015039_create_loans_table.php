<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedBigInteger('member_id');  // Reference to the member
            $table->unsignedBigInteger('book_id');    // Reference to the book
            $table->date('loan_date');  // The date when the book was loaned
            $table->date('due_date');   // The date when the book is due
            $table->timestamps(); // created_at and updated_at columns

            // Add foreign key constraints to link to the `members` and `books` tables
            $table->foreign('member_id')
                ->references('id')
                ->on('members')
                ->onDelete('cascade'); // Cascade on delete

            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->onDelete('cascade'); // Cascade on delete
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the 'loans' table if the migration is rolled back
        Schema::dropIfExists('loans');
    }
};
