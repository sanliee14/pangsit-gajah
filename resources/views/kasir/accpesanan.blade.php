<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acc Pesanan | Mie Pansit Gajah Siantar</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-blue-100 font-sans text-gray-800 min-h-screen pb-24">

<!-- Header -->
<nav class="bg-blue-500 text-white flex justify-between items-center px-6 py-3 shadow-lg">
    <h1 class="text-xl font-bold uppercase tracking-wide">Pesanan Masuk</h1>
</nav>

<!-- Pesanan masuk -->
<main class="p-5 space-y-4">
    @forelse ($data as $item)
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-blue-100 transition hover:shadow-blue-200">
        <!-- ID + TOTAL -->
        <div class="bg-yellow-100 px-5 py-3 flex justify-between items-center font-bold text-gray-700">
            <span>ID: #{{ $item['payment']->Id_Payment }}</span>
            <span>Total: <span class="text-blue-600">Rp{{ number_format($item['payment']->Jumlah_Bayar,0,',','.') }}</span></span>
        </div>

        <!-- NAMA + MEJA + DETAIL -->
        <div class="bg-blue-500 px-5 py-4 text-white flex justify-between items-center">
            <div class="leading-tight">
                <p class="text-lg font-bold">{{ $item['payment']->Id_Cart ? 'Meja ' . $item['payment']->Id_Cart : '-' }}</p>
                <p class="text-sm opacity-90">Status: {{ $item['payment']->Status }}</p>
            </div>

            <a href="{{ route('kasir.detailpesanan', $item['payment']->Id_Payment) }}"
                class="bg-yellow-400 text-black px-5 py-2.5 rounded-xl font-semibold shadow hover:bg-yellow-500 hover:scale-105 transition">
                Detail
            </a>
        </div>
    </div>
    @empty
    <p class="text-center text-gray-600 font-semibold">Belum ada pesanan masuk.</p>
    @endforelse
</main>

<!-- Nav bawah -->
<nav class="fixed bottom-0 left-0 w-full bg-white/90 backdrop-blur-md shadow-md py-3 px-8 flex justify-around items-center z-50">
    <!-- Bisa pakai nav sama seperti sebelumnya -->
</nav>

</body>
</html>
