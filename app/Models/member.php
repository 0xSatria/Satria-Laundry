<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $table = 'member';
    protected $fillable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'tlp'
    ];

    public function penjemputan()
    {
        return $this->hasMany(Penjemputan::class, 'id_penjemputan');
    }
}
