<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaanBarang extends Model
{
    use HasFactory;
    protected $table = 'penggunaan_barang';
    protected $guarded =  ['id', 'created_at', 'updated_at'];
}
