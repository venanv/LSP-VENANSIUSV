{{-- resources/views/loans/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Loan')

@section('content')
    <h1 class="text-center mb-4">Edit Loan</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Loan Form -->
    <form action="{{ route('loans.update', $loan->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- This is used to send a PUT request for updating -->

        <div class="mb-3">
            <label for="book_id" class="form-label">Book:</label>
            <select name="book_id" class="form-control" required>
                <option value="">Select Book</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}" {{ $loan->book_id == $book->id ? 'selected' : '' }}>
                        {{ $book->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="member_id" class="form-label">Member:</label>
            <select name="member_id" class="form-control" required>
                <option value="">Select Member</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" {{ $loan->member_id == $member->id ? 'selected' : '' }}>
                        {{ $member->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="loan_date" class="form-label">Loan Date:</label>
            <input type="date" name="loan_date" class="form-control" value="{{ old('loan_date', $loan->loan_date) }}" required>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date:</label>
            <input type="date" name="due_date" class="form-control" value="{{ old('due_date', $loan->due_date) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Loan</button>
    </form>

    <div class="mt-3">
        <a href="{{ route('loans.index') }}" class="btn btn-secondary">Back to Loan List</a>
    </div>
@endsection
