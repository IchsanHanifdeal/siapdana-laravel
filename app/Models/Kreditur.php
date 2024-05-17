<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kreditur extends Model
{
    use HasFactory;
    protected $table = 'kreditur';
    protected $primaryKey = 'id_kreditur';
    protected $fillable = ['id_user', 'no_handphone', 'tempat', 'tanggal_lahir', 'pekerjaan', 'alamat'];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
