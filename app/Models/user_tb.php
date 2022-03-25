<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_tb extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'username', 'password', 'id_outlet', 'role'];


    public function outlet()
    {
        return $this->belongsTo(outlet::class, "id_outlet");
    }
}
