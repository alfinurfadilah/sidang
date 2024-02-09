<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwalpemasangan extends Model
{
    use HasFactory;
    protected $table = 'jadwalpemasangan';
    // protected $with = ['jadwalsurvey'];
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
        
    ];
    public function freportsurvey(){
        return $this->belongsTo(reportsurvey::class, 'id_reportsurvey', 'id');
        }

        public function fjadwalsurvey(){
            return $this->belongsTo(jadwalsurvey::class, 'id_jadwalsurvey', 'id');
            }
}