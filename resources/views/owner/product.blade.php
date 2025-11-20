<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Produk | Mie Pansit Gajah Siantar</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="bg-blue-100 min-h-screen flex flex-col text-gray-800">

  <!-- Navbar -->
  <nav class="bg-blue-500 text-white flex justify-between items-center px-6 py-3 shadow-lg">
    <div class="flex items-center space-x-3">
      <img src="{{ asset('image/fix.png') }}" alt="Logo" class="w-10 h-10 rounded-full ring-2 ring-white/70">
      <h1 class="text-xl font-bold uppercase tracking-wide">Mie Pansit Gajah Siantar</h1>
    </div>
    <a href="{{ url('/') }}" class="bg-yellow-400 text-blue-900 font-semibold px-4 py-2 rounded-full shadow-md hover:bg-yellow-500 transition">
      Logout
    </a>
  </nav>

  <div class="flex flex-1">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-400 text-white min-h-screen p-6 shadow-xl">
      <h2 class="text-lg font-bold mb-6 text-white/90 uppercase tracking-wide">Menu Owner</h2>
      <ul class="space-y-4">
        <li><a href="{{ url('/owner/dashboard') }}" class="block py-2 px-3 rounded-full hover:bg-blue-300 hover:text-blue-900"> Dashboard</a></li>
        <li><a href="{{ url('/owner/transaksi') }}" class="block py-2 px-3 rounded-full hover:bg-blue-300 hover:text-blue-900"> Data Transaksi</a></li>
        <li><a href="{{ url('/owner/produk') }}" class="block bg-blue-500 py-2 px-3 rounded-full font-semibold text-center shadow"> Produk & Harga</a></li>
        <li><a href="{{ url('/owner/laporan') }}" class="block py-2 px-3 rounded-full hover:bg-blue-300 hover:text-blue-900"> Laporan Harian</a></li>
        <li><a href="{{ url('/owner/tambahproduct') }}" class="block py-2 px-3 rounded-full hover:bg-blue-300 hover:text-blue-900"> Tambah Produk</a></li>
      </ul>
    </aside>

    <!-- Konten Produk -->
    <main class="flex-1 p-8">
      <h2 class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-blue-400 text-transparent bg-clip-text mb-8">
        Kelola Produk
      </h2>

      <!-- Grid Produk (Static) -->
      <section class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        <!-- Produk 1 -->
        <div class="bg-white backdrop-blur-xl rounded-2xl shadow-md hover:shadow-blue-200 hover:scale-[1.02] transition p-4 text-center">
          <img src="{{ asset('image/mie1.png') }}" alt="Produk" class="w-full h-36 object-cover rounded-xl mb-3">
          <h2 class="font-semibold text-gray-800 text-base">Mie Pangsit Ayam</h2>
          <p class="text-blue-600 text-sm mb-3">Rp 18.000</p>

          <div class="flex justify-center gap-2">
            <a href="{{ url('/owner/edit-produk') }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm font-semibold shadow">Edit</a>
            <a href="#" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm font-semibold shadow">Hapus</a>
          </div>
        </div>

        <!-- Produk 2 -->
        <div class="bg-white backdrop-blur-xl rounded-2xl shadow-md hover:shadow-blue-200 hover:scale-[1.02] transition p-4 text-center">
          <img src="{{ asset('image/mie2.png') }}" alt="Produk" class="w-full h-36 object-cover rounded-xl mb-3">
          <h2 class="font-semibold text-gray-800 text-base">Mie Pangsit Spesial</h2>
          <p class="text-blue-600 text-sm mb-3">Rp 24.000</p>

          <div class="flex justify-center gap-2">
            <a href="{{ url('/owner/edit-produk') }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm font-semibold shadow">Edit</a>
            <a href="#" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm font-semibold shadow">Hapus</a>
          </div>
        </div>

        <!-- Produk 3 -->
        <div class="bg-white backdrop-blur-xl rounded-2xl shadow-md hover:shadow-blue-200 hover:scale-[1.02] transition p-4 text-center">
          <img src="{{ asset('image/mie3.png') }}" alt="Produk" class="w-full h-36 object-cover rounded-xl mb-3">
          <h2 class="font-semibold text-gray-800 text-base">Es Teh Manis</h2>
          <p class="text-blue-600 text-sm mb-3">Rp 6.000</p>

          <div class="flex justify-center gap-2">
            <a href="{{ url('/owner/edit-produk') }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm font-semibold shadow">Edit</a>
            <a href="#" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm font-semibold shadow">Hapus</a>
          </div>
        </div>

        <!-- Produk 4 -->
        <div class="bg-white backdrop-blur-xl rounded-2xl shadow-md hover:shadow-blue-200 hover:scale-[1.02] transition p-4 text-center">
          <img src="{{ asset('image/mie4.png') }}" alt="Produk" class="w-full h-36 object-cover rounded-xl mb-3">
          <h2 class="font-semibold text-gray-800 text-base">Milo Dingin</h2>
          <p class="text-blue-600 text-sm mb-3">Rp 10.000</p>

          <div class="flex justify-center gap-2">
            <a href="{{ url('/owner/editproduct') }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm font-semibold shadow">Edit</a>
            <a href="#" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm font-semibold shadow">Hapus</a>
          </div>
        </div>

      </section>

    </main>
  </div>

  <footer class="py-4 text-center text-gray-500 text-sm mt-auto">
    © {{ date('Y') }} Mie Pansit Gajah Siantar. Semua hak dilindungi.
  </footer>

</body>
</html>
