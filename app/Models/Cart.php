<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'Cart';
    protected $primaryKey = 'Id_Cart';

    // MATIKAN timestamps
    public $timestamps = false;

    protected $fillable = [
        'Nama',
        'No_Meja',
        'Status',
        'Id_Kasir',
        'Subtotal'
    ];
}
