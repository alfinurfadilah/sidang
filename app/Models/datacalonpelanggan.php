<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datacalonpelanggan extends Model
{
    
    use HasFactory;
    protected $table = 'datacalonpelanggan';
    protected $fillable = [
        'Nama',
        'Foto',
        'Nomor_Handphone',
        'Nama_Paket',
        'Alamat_Pemasangan',
        'Titik_Kordinat',
        // 'Hasil_Soft_Survey',
        
    ];

    public function datacekcoverage()
    {
        return $this->hasOne(datacekcoverage::class, 'id_calon_pelanggan');
    }

}