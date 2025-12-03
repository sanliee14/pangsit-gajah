<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Produk | Kasir</title>
@vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-b from-blue-100 via-blue-200 to-white min-h-screen flex flex-col text-gray-800">

<!-- Navbar -->
<nav class="bg-blue-500 text-white flex justify-between items-center px-6 py-3 shadow-lg">
    <div class="flex items-center space-x-3">
        <div class="relative w-10 h-10">
            <div class="absolute inset-0 bg-blue-400 blur-xl opacity-40 rounded-full"></div>
            <img src="{{ asset('image/fix.png') }}" alt="Logo" class="relative w-10 h-10 rounded-full ring-2 ring-white/70">
        </div>
        <h1 class="text-xl font-bold uppercase tracking-wide">Tambah Produk</h1>
    </div>

    <a href="{{ route('kasir.dashboard') }}" 
       class="bg-yellow-400 text-blue-900 font-semibold px-4 py-2 rounded-full shadow-md hover:bg-yellow-500 transition">
       ← Kembali
    </a>
</nav>

<!-- Form Container -->
<div class="flex justify-center items-center flex-1 px-4 py-8">
    <div class="bg-white shadow-2xl rounded-3xl p-8 w-full max-w-lg border border-blue-100">

        <h2 class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-blue-400 text-transparent bg-clip-text mb-6 text-center">
            Tambah Produk Baru
        </h2>

        <!-- Error Messages -->
        @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- FORM -->
        <form action="{{ route('kasir.tambahproduct') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Nama Produk -->
            <div>
                <label class="block font-semibold mb-2 text-blue-800">Nama Produk</label>
                <input type="text" name="Nama_Product" required placeholder="Contoh: Mie Pansit Original"
                    class="w-full border border-blue-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm">
            </div>

            <!-- Harga -->
            <div>
                <label class="block font-semibold mb-2 text-blue-800">Harga (Rp)</label>
                <input type="number" name="Harga" required placeholder="Contoh: 25000"
                    class="w-full border border-blue-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm">
            </div>

            <!-- Kategori -->
            <div>
                <label class="block font-semibold mb-2 text-blue-800">Kategori</label>
                <select name="kategori" required
                    class="w-full border border-blue-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="favorit">Favorit</option>
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                </select>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block font-semibold mb-2 text-blue-800">Deskripsi</label>
                <textarea name="Deskripsi" rows="3" required placeholder="Tuliskan deskripsi produk..."
                    class="w-full border border-blue-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm"></textarea>
            </div>

            <!-- Gambar Produk -->
            <div>
                <label class="block font-semibold mb-2 text-blue-800">Gambar Produk</label>
                <input type="file" name="Image" required accept="image/*"
                    class="w-full border border-blue-200 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400 shadow-sm bg-blue-50">
            </div>

            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-600 to-blue-400 text-white py-3 rounded-full font-semibold shadow-md hover:scale-[1.02] transition-all duration-200">
                Simpan Produk
            </button>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="py-4 text-center text-gray-500 text-sm mt-auto">
    © {{ date('Y') }} Mie Pansit Gajah Siantar. Semua hak dilindungi.
</footer>

</body>
</html>
