<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pesanan | Mie Pansit Gajah Siantar</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-blue-100 font-sans text-gray-800 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-blue-500 text-white py-4 px-6 shadow-md">
        <h1 class="text-lg font-bold">Detail Pesanan</h1>
        <p class="text-sm">{{ $nama }} | Nomor Meja : {{ $meja }}</p>
    </header>

    <!-- Konten -->
    <main class="flex-1 overflow-y-auto px-5 py-4 space-y-4">

        <!-- Item Pesanan -->
        @foreach ($cart as $item)
        <div class="bg-blue-200 rounded-2xl p-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('product/' . DB::table('product')->where('Id_Product', $item['product_id'])->value('Image')) }}" 
                     alt="{{ $item['name'] }}" class="w-16 h-16 rounded-xl object-cover">
                <div>
                    <p class="font-semibold text-gray-800">{{ $item['name'] }}</p>
                    <p class="text-sm text-gray-700">Rp{{ number_format($item['price'],0,',','.') }}</p>
                </div>
            </div>
            <span class="bg-yellow-300 text-sm font-semibold px-3 py-1 rounded-full">{{ $item['qty'] }}</span>
        </div>
        @endforeach

        <!-- Detail Pesanan -->
        <div class="bg-blue-200 rounded-2xl p-4 space-y-1 text-sm font-semibold">
            <p>Catatan Tambahan: -</p>
            <p>Metode Pembayaran: {{ ucfirst($payment->Metode) }}</p>
            <p>Waktu Pemesanan: {{ $payment->Waktu_Bayar }}</p>
            <p>Nomor Pesanan: #{{ $payment->Id_Payment }}</p>
            <p>Total Pesanan: Rp{{ number_format($payment->Jumlah_Bayar,0,',','.') }}</p>
        </div>

    </main>

    <!-- Status -->
    <footer class="bg-blue-500 text-white text-center py-4 font-semibold shadow-[0_-4px_10px_rgba(0,0,0,0.1)]">
        Status Pesanan: <span class="text-yellow-300">{{ ucfirst($payment->Status) }}</span>
    </footer>

</body>
</html>
