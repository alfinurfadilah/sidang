<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwalsurvey extends Model
{
    use HasFactory;
    protected $table = 'jadwalsurvey';
    // protected $with = ['datacekcoverage'];
    protected $fillable = [
        'nama',
        'nomor_handphone',
        'nama_paket',
        'alamat_pemasangan',
        'titik_kordinat',
        'hasil_soft_survey',
        'tanggal_survey',
        'waktu',
        'id_cekcoverage',
        
    ];


 // public function datacalonpelanggan()
    // {
    //     return $this->belongsTo(datacalonpelanggan::class, 'id_calon_pelanggan');
    // } 

    // public function fdatacalonpelanggan(){
    // return  $this->belongsTo(jadwalsurvey::class,  'id_datacekcoverage',  'id');

}