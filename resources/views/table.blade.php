<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 30px 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        a.button-add {
            background: #6366f1;
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 20px;
            transition: background 0.3s ease;
        }

        a.button-add:hover {
            background: #4f46e5;
        }

        .search-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-bottom: 25px;
        }

        .search-form input,
        .search-form select {
            padding: 10px 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        .search-form button {
            background: #10b981;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .search-form button:hover {
            background: #059669;
        }

        table {
            width: 100%;
            max-width: 1000px;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0,0,0,0.05);
            border-collapse: collapse;
        }

        thead {
            background: #3b82f6;
            color: white;
        }

        th, td {
            padding: 16px 20px;
            text-align: left;
            font-size: 14px;
        }

        tbody tr:nth-child(even) {
            background-color: #f3f4f6;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 13px;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            margin-right: 6px;
        }

        .btn-dark {
            background: #111827;
            color: white;
        }

        .btn-dark:hover {
            background: #1f2937;
        }

        .btn-primary {
            background: #3b82f6;
            color: white;
        }

        .btn-primary:hover {
            background: #2563eb;
        }

        button.btn-danger {
            background: #ef4444;
            color: white;
            border: none;
        }

        button.btn-danger:hover {
            background: #dc2626;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            color: #3b82f6;
            border: 1px solid #3b82f6;
            font-size: 14px;
        }

        .pagination a:hover {
            background: #3b82f6;
            color: white;
        }

        .pagination .active {
            background: #3b82f6;
            color: white;
            pointer-events: none;
        }

        .alert {
            background: #fef2f2;
            color: #991b1b;
            padding: 10px 16px;
            border-radius: 8px;
            font-weight: 500;
            text-align: center;
        }

        @media screen and (max-width: 768px) {
            .search-form {
                flex-direction: column;
                align-items: stretch;
            }

            table {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <a href="{{ route('product.create') }}" class="button-add">+ Add Product</a>

    <form class="search-form" action="{{ route('product.index') }}" method="GET">
        <input type="text" name="nama" placeholder="Search by name">
        <select name="kategori">
            <option value="">Select Category</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Pakaian">Pakaian</option>
            <option value="Makanan">Makanan</option>
             <option value="Lainnya">Lainnya</option>
        </select>
        <input type="number" name="harga_min" placeholder="Min Price">
        <input type="number" name="harga_max" placeholder="Max Price">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Created At</th>
                <th>Updated At</th>
                
                <th>Show</th>
                <th>Edit</th>
                <th>Deletes</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->Nama }}</td>
                    <td>{{ $product->Deskripsi }}</td>
                    <td>{{ number_format($product->Harga, 0, ',', '.') }}</td>
                    <td>{{ $product->Kategori }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                    
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('product.destroy', $product->id) }}" method="POST">
                            <a href="{{ route('product.show', $product->id) }}" class="btn-sm btn-dark">SHOW</a>
                            <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn-sm btn-primary">EDIT</a>
                            <td>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">
                        <div class="alert">Data Products belum ada.</div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $products->links('vendor.pagination.bootstrap-4') }}
    </div>
</body>
</html>
