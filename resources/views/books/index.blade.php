@extends('layouts.app')

@section('title', 'Loans List')

@section('content')
    <div class="container mt-5">
        <h1>Daftar Buku</h1>

        <!-- Tombol untuk Tambah Buku -->
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>

        <!-- Menampilkan Pesan Sukses Jika Ada -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Daftar Buku -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->stock }}</td>
                        <td>
                           
                            <!-- Tombol Edit Buku -->
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            
                            <!-- Form untuk Hapus Buku -->
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Menampilkan Pesan Jika Tidak Ada Buku -->
        @if($books->isEmpty())
            <div class="alert alert-warning mt-3">
                Tidak ada buku yang tersedia.
            </div>
        @endif
        
    </div>
@endsection
