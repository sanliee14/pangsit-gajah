<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Nama tabel sesuai database
    protected $table = 'Product'; // pastikan sesuai nama tabel MySQL

    // Primary key sesuai tabel
    protected $primaryKey = 'Id_Product';

    // Jika kolom created_at / updated_at tidak ada
    public $timestamps = false;
}

