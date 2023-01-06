<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';

    protected $fillable = [
        'tanggal',
        'harga',
        'pdf_url',
        'payment_type',
        'payment_code',
        'status',
        'id_order',
        'id_user',

    ];
}
