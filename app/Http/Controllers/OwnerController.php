<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function dashboard()
    {
        return view('owner.dashboard');
    }

    public function product()
    {
        return view('owner.product');
    }

    public function tambahproduct()
    {
        return view('owner.tambahproduct');
    }

    public function editpesanan()
    {
        return view('owner.editpesanan');
    }

    // Proses upload produk (TAPI STATIC, hanya kembali ke halaman)
    public function upproduct(Request $request)
    {
        return redirect()->to('/owner/product');
    }

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
