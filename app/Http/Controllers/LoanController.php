<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    // Show the form to loan a book
    public function create()
    {
        // Get all books and members to populate the form
        $books = Book::all();
        $members = Member::all();

        return view('loans.create', compact('books', 'members'));
    }

    // Store the loan in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'loan_date' => 'required|date',
            'due_date' => 'required|date',
        ]);

        Loan::create([
            'book_id' => $validated['book_id'],
            'member_id' => $validated['member_id'],
            'loan_date' => $validated['loan_date'],
            'due_date' => $validated['due_date'],
        ]);

        return redirect()->route('loans.index')->with('success', 'Book loaned successfully!');
    }

    // Show all loans
    public function index()
    {
        $loans = Loan::with('book', 'member')->get(); // Eager load book and member relationships
        return view('loans.index', compact('loans'));
    }
}
