<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cicilan extends Model
{
    use HasFactory;
    protected $table = 'cicilan';
    protected $primaryKey = 'id_cicilan';
    protected $fillable = ['tanggal_jatuhtempo', 'tanggal_pembayaran', 'id_peminjaman', 'jumlah_angsuran', 'status', 'sisa_bulan'];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }
}
