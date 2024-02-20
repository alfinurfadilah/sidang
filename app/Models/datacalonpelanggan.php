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
        'id_paket'
        
    ];

    public function datacekcoverage()
    {
        return $this->hasOne(datacekcoverage::class, 'id_calon_pelanggan');
    }
    

    public function fpaket(){
    return  $this->belongsTo(paket::class,  'id_paket',  'id');
    }

}