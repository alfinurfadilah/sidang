<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reportpemasangan extends Model
{
    use HasFactory;
    protected $table = 'reportpemasangan';
    // protected $with = ['jadwalsurvey'];
    protected $fillable = [
        'nama',
        'site',
        'tanggal_pemasangan',
        'waktu',
        'nama_teknisi',
        'hasil_redaman',
        'status_pemasangan',
        'kebutuhan_Access_Point',
        'SN_Access_Point',
        'kebutuhan_HTB',
        'id_jadwalpemasangan'
        
        
    ];
    
    public function fjadwalpemasangan(){
        return $this->belongsTo(jadwalpemasangan::class, 'id_jadwalpemasangan', 'id');
        }

 // public function datacalonpelanggan()
    // {
    //     return $this->belongsTo(datacalonpelanggan::class, 'id_calon_pelanggan');
    // } 

    // public function fdatacalonpelanggan(){
    // return  $this->belongsTo(jadwalsurvey::class,  'id_datacekcoverage',  'id');

}