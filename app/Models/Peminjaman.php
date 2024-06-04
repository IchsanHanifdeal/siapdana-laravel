<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $fillable = ['id_user', 'jumlah', 'tenor', 'tanggal', 'validasi'];

    public function user() 
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function cicilan()
    {
        return $this->hasMany(Cicilan::class, 'id_peminjaman');
    }
}

