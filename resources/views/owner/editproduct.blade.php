<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Produk | Mie Pansit Gajah Siantar</title>
  @vite('resources/css/app.css')
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>

<body class="bg-blue-100 min-h-screen flex flex-col text-gray-800">

  <!-- Navbar -->
  <nav class="bg-blue-500 text-white flex justify-between items-center px-6 py-3 shadow-lg">
    <div class="flex items-center space-x-3">
      <img src="{{ asset('image/fix.png') }}" class="w-10 h-10 rounded-full ring-2 ring-white/70">
      <h1 class="text-xl font-bold uppercase tracking-wide">Mie Pansit Gajah Siantar</h1>
    </div>

    <a href="{{ url('/') }}"
      class="bg-yellow-400 text-blue-900 font-semibold px-4 py-2 rounded-full shadow-md hover:bg-yellow-500 transition">
      Logout
    </a>
  </nav>

  <div class="flex flex-1">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-400 text-white min-h-screen p-6 shadow-xl">
      <h2 class="text-lg font-bold mb-6 uppercase tracking-wide">Menu Owner</h2>
      <ul class="space-y-4">
        <li><a href="{{ url('/owner/dashboard') }}" class="block py-2 px-3 rounded-full hover:bg-blue-300 transition">Dashboard</a></li>
        <li><a href="{{ url('/owner/transaksi') }}" class="block py-2 px-3 rounded-full hover:bg-blue-300 transition">Data Transaksi</a></li>
        <li><a href="{{ url('/owner/produk') }}" class="block bg-blue-500 py-2 px-3 rounded-full font-semibold shadow hover:bg-blue-600 transition">Produk & Harga</a></li>
        <li><a href="{{ url('/owner/laporan') }}" class="block py-2 px-3 rounded-full hover:bg-blue-300 transition">Laporan Harian</a></li>
        <li><a href="{{ url('/owner/tambahproduct') }}" class="block py-2 px-3 rounded-full hover:bg-blue-300 transition">Tambah Produk</a></li>
      </ul>
    </aside>

    <!-- Konten Edit Produk -->
    <main class="flex-1 p-10">

      <h2 class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-blue-400 text-transparent bg-clip-text mb-10">
        Edit Produk
      </h2>

      <div class="bg-white p-8 rounded-3xl shadow-lg border border-blue-100 max-w-xl">

        <!-- Gambar sebelumnya -->
        <div class="mb-5">
          <p class="font-semibold text-gray-700 mb-2">Gambar Produk Saat Ini:</p>
          <img src="{{ asset('image/default.png') }}" class="w-40 h-40 object-cover rounded-xl shadow">
        </div>

        <!-- Form Edit -->
        <div class="space-y-4">

          <div>
            <label class="font-semibold text-gray-700">Nama Produk</label>
            <input type="text" value="Contoh Produk"
              class="w-full mt-2 p-3 rounded-xl border border-blue-200 focus:ring focus:ring-blue-300 outline-none">
          </div>

          <div>
            <label class="font-semibold text-gray-700">Harga Produk</label>
            <input type="number" value="15000"
              class="w-full mt-2 p-3 rounded-xl border border-blue-200 focus:ring focus:ring-blue-300 outline-none">
          </div>

          <div>
            <label class="font-semibold text-gray-700">Ganti Gambar (Opsional)</label>
            <input type="file"
              class="w-full mt-2 p-3 rounded-xl border border-blue-200 bg-white focus:ring focus:ring-blue-300 outline-none">
          </div>

        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-between mt-8">

          <a href="{{ url('/owner/produk') }}"
            class="bg-gray-400 text-white px-5 py-2 rounded-xl shadow hover:bg-gray-500 transition">
            Kembali
          </a>

          <div class="flex gap-3">
            <button class="bg-yellow-400 text-white px-5 py-2 rounded-xl shadow hover:bg-yellow-500 transition">
              Simpan Perubahan
            </button>

            <button class="bg-red-500 text-white px-5 py-2 rounded-xl shadow hover:bg-red-600 transition">
              Hapus Produk
            </button>
          </div>

        </div>

      </div>
    </main>
  </div>

  <footer class="py-4 text-center text-gray-500 text-sm mt-auto">
    © {{ date('Y') }} Mie Pansit Gajah Siantar. Semua hak dilindungi.
  </footer>

</body>
</html>
