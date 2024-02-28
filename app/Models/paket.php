<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'paket';
    protected $fillable = [
        'Nama_Paket',
        'Harga_Paket',
    ];

    public function datacalonpelanggan()
    {
        return $this->hasOne(Datacalonpelanggan::class, 'id_paket');
    }
}
