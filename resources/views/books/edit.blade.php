<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Buku</h1>

        <!-- Form untuk Edit Buku -->
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menggunakan metode PUT untuk update data -->

            <!-- Input untuk Judul Buku -->
            <div class="mb-3">
                <label for="title" class="form-label">Judul Buku</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $book->title) }}" required>
            </div>

            <!-- Input untuk Penulis Buku -->
            <div class="mb-3">
                <label for="author" class="form-label">Penulis</label>
                <input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}" required>
            </div>

            <!-- Input untuk Stok Buku -->
            <div class="mb-3">
                <label for="stock" class="form-label">Jumlah Stok</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', $book->stock) }}" required>
            </div>

            <!-- Tombol Simpan Perubahan -->
            <button type="submit" class="btn btn-primary">Update Buku</button>
        </form>

        <!-- Tombol Kembali ke Daftar Buku -->
        <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Buku</a>
    </div>
</body>
</html>
