<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    public $incrementing = true;
    protected $table = 'transaksi';
    protected $guarded =  ['id', 'created_at', 'updated_at'];

    public function outlet()
    {
        return $this->belongsTo(outlet::class, "id_outlet");
    }

    public function member()
    {
        return $this->belongsTo(member::class, "id_member");
    }

    public function transaksi()
    {
        return $this->belongsTo(member::class, "id_transaksi");
    }
}
