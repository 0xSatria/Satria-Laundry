<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjemputan extends Model
{
    use HasFactory;
    protected $table = 'penjemputans';
    protected $guarded =  ['id', 'created_at', 'updated_at'];

    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member');
    }
}
