<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi';
    protected $guarded =  ['id', 'created_at', 'updated_at'];

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class, "id_transaksi");
    }

    public function paket()
    {
        return $this->belongsTo(paket::class, "id_paket");
    }
}
