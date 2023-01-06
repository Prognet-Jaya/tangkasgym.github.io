<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal_latihan extends Model
{
    use HasFactory;
    protected $table = 'jadwal_latihans';

    protected $fillable = [
        'hari',
        'jam_awal',
        'jam_akhir',
        'id_training',
        'id_trainer',
    ];
}
