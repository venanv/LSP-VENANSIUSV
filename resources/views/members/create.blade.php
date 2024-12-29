{{-- resources/views/members/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Create Member')

@section('content')
    <h1 class="text-center mb-4">Create a New Member</h1>

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

    <!-- Member Creation Form -->
    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Create Member</button>
    </form>

    <div class="mt-3">
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Back to Members List</a>
    </div>
@endsection
