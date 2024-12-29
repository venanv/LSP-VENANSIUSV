{{-- resources/views/members/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Member')

@section('content')
    <h1 class="text-center mb-4">Edit Member</h1>

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

    <!-- Member Edit Form -->
    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $member->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $member->email) }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Update Member</button>
    </form>

    <div class="mt-3">
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Back to Members List</a>
    </div>
@endsection
