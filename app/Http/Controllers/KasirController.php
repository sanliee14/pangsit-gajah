<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    public function login()
    {
        return view('kasir.login');
    }

    public function dashboardkasir()
    {
        $product = DB::table('product')->get();
        return view('kasir.dashboard', compact('product'));
    }

    public function payment()
    {
        return view('kasir.payment');
    }

    public function accpesanan()
    {
    $payments = DB::table('payment')
            ->whereIn('Status', ['menunggu','diproses'])
            ->orderBy('Waktu_Bayar', 'desc')
            ->get();

        // Ambil detail menu per payment
        $data = [];
        foreach($payments as $payment) {
            $details = DB::table('detail_cart')
                ->where('Id_Payment', $payment->Id_Payment)
                ->get();

            $data[] = [
                'payment' => $payment,
                'details' => $details
            ];
        }

        return view('kasir.accpesanan', compact('data'));
    }

    public function detailpesanan()
    {
        return view('kasir.detailpesanan');
    }

    public function prosespesanan()
    {
        return view('kasir.prosespesanan');
    }

    public function detailproses()
    {
        return view('kasir.detailproses');
    }

    public function history()
    {
        return view('kasir.history');
    }

    public function transaksi()
    {
        return view('kasir.transaksi');
    }
}
