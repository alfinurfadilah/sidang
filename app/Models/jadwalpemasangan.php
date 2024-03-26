<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalpemasangan extends Model
{
    use HasFactory;
    protected $table = 'jadwalpemasangan';
    // protected $with = ['reportsurvey'];
    protected $fillable = [
        'nama',
        'nomor_handphone',
        'nama_paket',
        'alamat_pemasangan',
        'tanggal_pemasangan',
        'waktu',
        'titik_kordinat',
        'id_jadwalsurvey',
        'id_reportsurvey',
        'id_paket',
        
    ];
    public function freportsurvey(){
        return $this->belongsTo(Reportsurvey::class, 'id_reportsurvey', 'id');
        }

        public function fjadwalsurvey(){
            return $this->belongsTo(Jadwalsurvey::class, 'id_jadwalsurvey', 'id');
            }

        public function fpaket(){
            return  $this->belongsTo(Paket::class,  'id_paket',  'id');
            }
}