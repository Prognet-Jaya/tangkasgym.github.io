<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_merchandise extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'tb_merchandises';

    protected $fillable = [
        'nama_merchandise',
        'harga',
        'stok',
        'merk_merchandise',
        'jenis_merchandise',

    ];
    
}
