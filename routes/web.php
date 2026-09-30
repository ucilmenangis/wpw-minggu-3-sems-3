<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DemoFormController;

// Routing menuju Controller
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);
Route::get('/demo-form', [DemoFormController::class, 'create']);
Route::post('/submit-demo', [DemoFormController::class, 'store']);

// Acara 9
Route::get('/', function () {
    return view('welcome');
});

Route::get('/tabel' , function (){
    return "hello world";
});

Route::get('/tabel/{id}' , function ($id){
    return "Your ID: " . $id;
});

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::get('dashboard/{name}', function ($name) {
    return "Welcome, " . $name;
});

// Acara 10

// Route groups
Route::prefix('admin')->group(function () {
    Route::get('/dashboard/{name}', function ($name) {
        return "Admin Dashboard Page for " . $name;
    });

    Route::get('/settings', function () {
        return "Admin Settings Page";
    });
});

// Route methods
Route::get('/about', function () { return "Get request"; });
Route::post('/about', function () { return "Post request"; });
Route::put('/about', function () { return "Put request"; });
Route::delete('/about', function () { return "Delete request"; });
Route::patch('/about', function () { return "Patch request"; });

// Fallback route
Route::fallback(function () {
    return "404 Not Found";
});

// Acara 11 dan 12
// Rute Dashboard POS
Route::get('/pos', function () {
    return view('dashboard_pos', [
        'nama_pegawai' => 'Budi Santoso',
        'shift' => 'Pagi (08:00-15:00)'
    ]);
});

// Rute dengan Parameter Wajib
Route::get('/produk/{id}', function ($id) {
    return 'Menampilkan data produk dengan ID: ' . $id;
});

// Rute dengan Parameter Opsional
Route::get('/produk/cari/{nama?}', function ($nama = null) {
    if ($nama) {
        return 'Hasil pencarian produk: ' . $nama;
    }
    return 'Silakan masukkan kata kunci pencarian pada URL (contoh: /produk/cari/sabun)';
});

// Route Groups & Prefix untuk Admin
Route::prefix('admin')->group(function () {
    Route::get('/produk', function () {
        return 'Halaman Kelola Produk (Hanya Admin)';
    })->name('admin.produk');

    Route::get('/kategori', function () {
        return 'Halaman Kelola Kategori Produk (Hanya Admin)';
    })->name('admin.kategori');
});

// Route Groups & Prefix untuk Kasir
Route::prefix('kasir')->group(function () {
    Route::get('/transaksi', function () {
        return 'Halaman Input Transaksi Penjualan (Kasir)';
    })->name('kasir.transaksi');
});

// Tantangan Mandiri: Rute daftar produk dengan tambahan array gambar
Route::get('/produk-toko', function () {
    $produk = [
        ['no' => 1, 'nama' => 'Beras 5kg', 'sku' => 'BRS-001', 'harga' => 75000, 'stok' => 20, 'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRW20JmltJnh2-rvWl6sO6-u_YnUrRHwOGl7O0z9jm4g&s=10'],
        ['no' => 2, 'nama' => 'Minyak 2L', 'sku' => 'MG-002', 'harga' => 32000, 'stok' => 15, 'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSThgVE7_JUGwntIsrm6mlKvJt5SUaTXw9oJKnrMmQbxg&s=10'],
        ['no' => 3, 'nama' => 'Gula 1kg', 'sku' => 'GL-003', 'harga' => 16000, 'stok' => 30, 'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_nzm-fs4zuWzydaoYjTvFjS1vJoLwXemojdoc2BIF0A&s=10'],
    ];
    return view('daftar_produk', ['produk' => $produk]);
});
