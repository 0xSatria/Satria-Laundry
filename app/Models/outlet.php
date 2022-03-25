<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outlet extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $table = 'outlet';
    protected $fillable = [
        'nama',
        'alamat',
        'tlp'
    ];


    public function paket()
    {
        return $this->hasMany(Paket::class, 'id_outlet');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id_outlet');
    }
}
