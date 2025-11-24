<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class CustomerController extends Controller
{
    public function dashboard()
    {
        return view('customer.home');
    }

    public function data()
    {
        return view('customer.data');
    }

    public function ordermenu()
    {
    $product = DB::table('product')->get();
    return view('customer.order', compact('product'));
    }

    public function order(Request $request)
    {
    try {
        session([
            'nama_customer' => $request->nama,
            'no_meja' => $request->meja,
        ]);

        DB::table('cart')->insert([
            'Nama'      => $request->nama,
            'No_Meja'   => $request->meja,
            'Status'    => 'diproses',
            'Id_Kasir'  => '1',
        ]);

        // Jika sukses, langsung ke halaman berikutnya
        return redirect('/customer/order');

    } catch (\Exception $e) {
        // Ambil pesan error dari MySQL
        $error = $e->getMessage();

        // Jika pesan mengandung ":" → ambil setelahnya
        if (str_contains($error, ':')) {
            $error = explode(':', $error, 2)[1];
        }

        // Buang sisa tulisan dalam kurung (Connection, SQL, dll)
        if (str_contains($error, '(')) {
            $error = explode('(', $error)[0];
        }
        $error = str_replace(['<<Unknown error>>:', '<Unknown error>'], '', $error);
        $error = preg_replace('/\b1644\b/', '', $error);
        $error = trim($error);
        return back()->withErrors(['db' => $error]);
    }
    }

    public function cart(Request $request)
    {
    $cart = session()->get('cart', []);
    $id = $request->id;

    if (!isset($cart[$id])) {
        $cart[$id] = [
            'product_id' => $id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => 1
        ];
    } else {
        $cart[$id]['qty']++;
    }

    session()->put('cart', $cart);

    return response()->json([
        'count' => array_sum(array_column($cart, 'qty')),
        'total' => array_sum(array_map(fn($i) => $i['qty'] * $i['price'], $cart))
    ]);
    }

    public function cartupdate(Request $request)
    {
    $cart = session()->get('cart', []);
    $id = $request->id;
    $action = $request->action; // plus atau minus

    if (!isset($cart[$id])) {
        return response()->json(['error' => 'Item tidak ditemukan'], 400);
    }

    if ($action === 'plus') {
        $cart[$id]['qty']++;
    }

    if ($action === 'minus') {
        $cart[$id]['qty']--;

        // Kalau qty jadi 0 → hapus item
        if ($cart[$id]['qty'] <= 0) {
            unset($cart[$id]);
        }
    }

    // Update session
    session()->put('cart', $cart);

    // Hitung ulang
    $totalQty = array_sum(array_column($cart, 'qty'));
    $totalPrice = array_sum(array_map(fn($i) => $i['qty'] * $i['price'], $cart));

    return response()->json([
        'qty' => $cart[$id]['qty'] ?? 0,
        'count' => $totalQty,
        'total' => $totalPrice
    ]);
    }

    public function fav()
    { 
        $products = DB::table('product')->get();
        return view('customer.fav', ['products' => $products]);
    }

    public function makanan()
    {
        $products = DB::table('product')->get();
        return view('customer.makanan', ['products' => $products]);
    }

    public function minuman()
    {
        $products = DB::table('product')->get();
        return view('customer.minuman', ['products' => $products]);
    }

    public function checkout()
    {
    // Ambil session keranjang (dari JS)
    $cart = session()->get('cart', []);

    // Kalau cart kosong -> alihkan
    if (empty($cart)) {
        return redirect()->back()->with('error', 'Keranjang masih kosong');
    }

    // Nama & meja ambil dari session cart_id sebelumnya
    $nama = session('nama_customer');
    $meja = session('no_meja');

    // Hitung total
    $total = array_sum(array_map(function($item) {
        return $item['qty'] * $item['price'];
    }, $cart));

    return view('customer.checkout', [
        'cart' => $cart,
        'nama' => $nama,
        'meja' => $meja,
        'total' => $total
    ]);
    }

    public function bayar(Request $request)
{
    $payment = $request->payment_method; // cash, qris, dll
    $cart    = session()->get('cart', []);
    $total   = $request->total;

    if (empty($cart)) {
        return redirect()->back()->with('error', 'Keranjang kosong.');
    }

    // Simpan ke tabel payment
    $paymentId = DB::table('payment')->insertGetId([
        'Metode'           => $payment,
        'Waktu_Bayar'      => now(),
        'Jumlah_Bayar'     => $total,
        'Status'           => 'menunggu',
        'Bukti_Pembayaran' => null,
    ]);

    // Simpan cart & Id_Payment ke session supaya proses() bisa menampilkan data
    session([
        'last_payment_cart' => $cart,
        'last_payment_id'   => $paymentId,
    ]);

    // Kosongkan cart
    session()->forget('cart');

    // Redirect sesuai metode pembayaran
    if ($payment === 'cash') {
        return redirect()->route('customer.proses')->with('success', 'Pembayaran berhasil dicatat.');
    }

    return redirect()->route('customer.qris')->with('success', 'Silahkan lanjutkan pembayaran QRIS.');
}

    public function proses() 
    {
    $cart = session('last_payment_cart', []);
    $payment = DB::table('payment')->where('Id_Payment', session('last_payment_id'))->first();
    $nama = session('nama_customer', 'Customer');
    $meja = session('no_meja', '-');

    if (empty($cart) || !$payment) {
        return redirect()->route('customer.checkout')->with('error', 'Tidak ada pesanan terbaru.');
    }

    return view('customer.proses', compact('cart', 'payment', 'nama', 'meja'));
    }

    public function qris()
    {
        return view('customer.qris');
    }

    public function bukti(Request $request)
    {
    $request->validate([
        'bukti' => 'required|image|max:2048', // maksimal 2MB
    ]);

    $file = $request->file('bukti');
    $filename = time().'_'.$file->getClientOriginalName();
    $file->move(public_path('bukti'), $filename);

    // Simpan ke tabel payment sesuai customer / pesanan
    DB::table('payment')->where('Metode', 'qris')->update([
        'Bukti_Pembayaran' => $filename,
        'Status' => 'menunggu'
    ]);

    // Redirect ke halaman proses
    return redirect()->route('customer.proses')->with('success', 'Bukti pembayaran berhasil dikirim.');
    }

}