<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Buku Baru</h1>

        <!-- Form untuk Menambah Buku -->
        <form action="{{ route('books.store') }}" method="POST">
            @csrf  <!-- CSRF token untuk keamanan form -->
            
            <!-- Input untuk Judul Buku -->
            <div class="mb-3">
                <label for="title" class="form-label">Judul Buku</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input untuk Penulis Buku -->
            <div class="mb-3">
                <label for="author" class="form-label">Penulis</label>
                <input type="text" name="author" class="form-control" value="{{ old('author') }}" required>
                @error('author')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input untuk Jumlah Stok Buku -->
            <div class="mb-3">
                <label for="stock" class="form-label">Jumlah Stok</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" required>
                @error('stock')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Simpan Buku -->
            <button type="submit" class="btn btn-primary">Simpan Buku</button>
        </form>

        <!-- Tombol Kembali ke Daftar Buku -->
        <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Buku</a>
    </div>
</body>
</html>
