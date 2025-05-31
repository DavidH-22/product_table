<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
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
        }

        h2 {
            text-align: center;
            color: #2196F3;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 15px;
            width: 100%;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Produk</h2>
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="Nama">Nama Produk:</label>
            <input type="text" id="Nama" name="Nama" value="{{ $product->Nama }}" required>

            <label for="Deskripsi">Deskripsi:</label>
            <textarea id="Deskripsi" name="Deskripsi" required>"{{ $product->Deskripsi }}"</textarea>

            <label for="Harga">Harga:</label>
            <input type="number" id="Harga" name="Harga" value="{{ $product->Harga }}" required>

            <label for="Kategori">Kategori:</label>
            <select id="Kategori" name="Kategori" required>
                <option value="Elektronik" {{ $product->Kategori == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                <option value="Pakaian" {{ $product->kategori == 'Pakaian' ? 'selected' : '' }}>Pakaian</option>
                <option value="Makanan" {{ $product->kategori == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                <option value="Lainnya" {{ $product->kategori == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>