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

        DB::table('cart')->insert([
            'Nama'      => $request->nama,
            'No_Meja'   => $request->meja,
            'Status'    => 'diproses',
            'Id_Kasir'  => '1',
        ]);

        // Jika sukses, langsung ke halaman berikutnya
        return redirect('/customer/makanan');

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
        return view('customer.checkout');
    }

    public function qris() 
    {
        return view('customer.qris');
    }

    public function proses() 
    {
        return view('customer.proses');
    }
}
