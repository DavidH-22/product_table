<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            background: white;
            padding: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 50%;
            text-align: center;
        }

        h2 {
            color: #2196F3;
        }

        .details {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .actions {
            margin-top: 15px;
        }

        .btn {
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            display: inline-block;
            text-decoration: none;
            transition: 0.3s ease-in-out;
        }

        .btn-dark {
            background: #333;
            color: white;
        }

        .btn-dark:hover {
            background: #555;
        }

        .btn-primary {
            background: #007BFF;
            color: white;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .btn-danger {
            background: #E53935;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
        }

        .btn-danger:hover {
            background: #C62828;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Detail Produk</h2>
        <div class="details">
            <p><strong>ID:</strong> {{ $product->id }}</p>
            <p><strong>Nama:</strong> {{ $product->nama }}</p>
            <p><strong>Deskripsi:</strong> {{ $product->deskripsi }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
            <p><strong>Kategori:</strong> {{ $product->kategori }}</p>
            <p><strong>Created At:</strong> {{ $product->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $product->updated_at }}</p>
        </div>
        <div class="actions">
            <a href="{{ route('product.index') }}" class="btn btn-dark">Kembali</a>
            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>

            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">Hapus</button>
            </form>
        </div>
    </div>
</body>
</html>