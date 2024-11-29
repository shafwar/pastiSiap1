<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ruang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container py-5">
        <div class="w-50 mx-auto">
            <h1>Edit Ruang</h1>
            <!-- Form untuk mengedit ruang -->
            <form action="{{ route('ruang.update', $ruang->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Ruang</label>
                    <input type="text" name="kode" class="form-control" value="{{ old('kode', $ruang->kode) }}" readonly>
                </div>
                
                <div class="mb-3">
                    <label for="kapasitas" class="form-label">Kapasitas</label>
                    <input type="text" name="kapasitas" class="form-control" value="{{ old('kapasitas', $ruang->kapasitas) }}" required>
                </div>
                
                <div class="mb-3">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <input type="text" name="prodi" class="form-control" value="{{ old('prodi', $ruang->prodi) }}" required>
                </div>
                
                

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('ruang.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
