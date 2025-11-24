<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    public function login()
    {
        return view('owner.login');
    }

    public function dashboard()
    {
    $total_hari_ini = DB::table('cart')
        ->whereDate('created_at', now())
        ->sum('total');

    $jumlah_pesanan = DB::table('cart')
        ->whereDate('created_at', now())
        ->count();

    $total_produk = DB::table('product')->count();

    $transaksi = DB::table('cart')
        ->orderBy('Id_Cart', 'desc')
        ->take(5)
        ->get();

    return view('owner.dashboard', compact(
        'total_hari_ini',
        'jumlah_pesanan',
        'total_produk',
        'transaksi'
    ));
    }

    public function product()
    {
        // ambil semua produk dari tabel product
        $product = DB::table('product')->get();
        return view('owner.product', compact('product'));
    }

    // TAMPIL FORM + SIMPAN PRODUK
    public function tambahproduct(Request $request)
    {
        // Jika GET → tampilkan form
        if ($request->isMethod('get')) {
            return view('owner.tambahproduct');
        }

        // Jika POST → simpan ke database
        $request->validate([
            'Nama_Product'    => 'required',
            'Harga'    => 'required|integer',
            'kategori' => 'required',
            'Deskripsi'    => 'required',
            'Image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imageName = time() . '.' . $request->Image->extension();
        $request->Image->move(public_path('product'), $imageName);

        DB::table('product')->insert([
            'Nama_Product' => $request->Nama_Product,
            'Harga'        => $request->Harga,
            'kategori'     => $request->kategori,
            'Deskripsi'    => $request->Deskripsi,
            'Image'        => $imageName
        ]);

        return redirect()->route('owner.product')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function editpesanan()
    {
        return view('owner.editpesanan');
    }

    // Proses upload produk (TAPI STATIC, hanya kembali ke halaman)

    // Halaman edit produk
    public function editproduct($id)
    {
        return view('owner.editproduct', [
            'id' => $id
        ]);
    }

    // Update produk (fake action)
    public function updateProduct(Request $request, $id)
    {
        return redirect()->to('/owner/product');
    }

    // Hapus produk (fake action)
    public function deleteProduct($id)
    {
        return redirect()->to('/owner/product');
    }

    // Transaksi
    public function transaksi()
    {
        return view('owner.transaksi');
    }

    // Laporan (static juga)
    public function laporan()
    {
        // data graph static
        $labels = ['2025-01-01', '2025-01-02', '2025-01-03'];
        $totals = [120000, 180000, 90000];

        return view('owner.laporan', compact('labels', 'totals'));
    }
}
