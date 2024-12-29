{{-- resources/views/members/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Members List')

@section('content')
    <h1 class="text-center mb-4">Members List</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Members Table -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Delete Button with Form -->
                            <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Member Button -->
    <div class="text-center">
        <a href="{{ route('members.create') }}" class="btn btn-primary">Create a New Member</a>
    </div>
@endsection
