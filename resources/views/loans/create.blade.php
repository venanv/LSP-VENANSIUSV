{{-- resources/views/loans/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Loan a Book')

@section('content')
    <h1 class="text-center mb-4">Loan a Book</h1>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Loan Form -->
    <form action="{{ route('loans.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="book_id" class="form-label">Book:</label>
            <select name="book_id" class="form-control" required>
                <option value="">Select Book</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="member_id" class="form-label">Member:</label>
            <select name="member_id" class="form-control" required>
                <option value="">Select Member</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="loan_date" class="form-label">Loan Date:</label>
            <input type="date" name="loan_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date:</label>
            <input type="date" name="due_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Loan Book</button>
    </form>

    <div class="mt-3">
        <a href="{{ route('loans.index') }}" class="btn btn-secondary">Back to Loan List</a>
    </div>
@endsection
