@extends('layouts.app')

@section('title', 'Loans List')

@section('content')

    <div class="container mt-5">
        <h1>Daftar Kategori Buku</h1>

        <!-- Menampilkan Pesan Sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Tambah Kategori -->
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

        <!-- Tabel Daftar Kategori -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <!-- Tombol Edit Kategori -->
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>

                            <!-- Tombol Hapus Kategori -->
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Menampilkan Pesan Jika Tidak Ada Kategori -->
        @if($categories->isEmpty())
            <div class="alert alert-warning mt-3">
                Tidak ada kategori buku yang tersedia.
            </div>
        @endif
    </div>
@endsection
