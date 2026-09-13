<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk Toko</title>
    <style>
        img { border-radius: 8px; }
        th, td { text-align: center; }
    </style>
</head>
<body>
    <h2>Daftar Produk Kelontong</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>SKU</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $item)
            <tr>
                <td>{{ $item['no'] }}</td>
                <td><img src="{{ $item['gambar'] }}" alt="{{ $item['nama'] }}" width="80"></td>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['sku'] }}</td>
                <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                <td>{{ $item['stok'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
