{{-- resources/views/loans/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Loans List')

@section('content')
    <h1 class="text-center mb-4">Loans List</h1>

    <!-- Display Success or Error Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Table to display loans -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Loan ID</th>
                <th>Book Title</th>
                <th>Member Name</th>
                <th>Loan Date</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->id }}</td>
                    <td>{{ $loan->book->title }}</td> <!-- Displaying the book title -->
                    <td>{{ $loan->member->name }}</td> <!-- Displaying the member name -->
                    <td>{{ $loan->loan_date }}</td>
                    <td>{{ $loan->due_date }}</td>
                    <td>
                        <!-- Edit and Delete Buttons -->
                        <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this loan?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center mt-4">
        <a href="{{ route('loans.create') }}" class="btn btn-primary">Add New Loan</a>
    </div>
@endsection
