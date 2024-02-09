<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datacekcoverage extends Model
{
    use HasFactory;
    protected $table = 'datacekcoverage';
    protected $with = ['datacalonpelanggan'];
    protected $fillable = [
        'Nama',
        'Nomor_Handphone',
        'Nama_Paket',
        'Alamat_Pemasangan',
        'Titik_Kordinat',
        'Hasil_Soft_Survey',
        'id_calon_pelanggan',

        
    ];

    public function datacalonpelanggan()
    {
        return $this->belongsTo(datacalonpelanggan::class, 'id_calon_pelanggan');
    } 

    public function fdatacalonpelanggan(){
    return  $this->belongsTo(datacekcoverage::class,  'id_datacalonpelanggan',  'id');
    }

}
