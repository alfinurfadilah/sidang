<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportpemasangan extends Model
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
        'id_jadwalpemasangan',
        'id_site'
        
        
    ];
    
    public function fjadwalpemasangan(){
        return $this->belongsTo(Jadwalpemasangan::class, 'id_jadwalpemasangan', 'id');
        }

    public function fsite(){
        return $this->belongsTo(Site::class, 'id_site', 'id');
        }

    public function teknisis()
        {
            return $this->belongsToMany(Teknisi::class, 'reportpemasangan_teknisi', 'id_reportpemasangan', 'id_teknisi');
        }

 // public function datacalonpelanggan()
    // {
    //     return $this->belongsTo(datacalonpelanggan::class, 'id_calon_pelanggan');
    // } 

    // public function fdatacalonpelanggan(){
    // return  $this->belongsTo(jadwalsurvey::class,  'id_datacekcoverage',  'id');

}