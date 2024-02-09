<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reportsurvey extends Model
{
    use HasFactory;
    protected $table = 'reportsurvey';
    // protected $with = ['jadwalsurvey'];
    protected $fillable = [
        'nama',
        'site',
        'tanggal_survey',
        'waktu',
        'nama_teknisi',
        'FDT',
        'ODP',
        'kabel',
        'clamp',
        'kabel_tis',
        'fascon',
        'status',
        'id_jadwalsurvey'
        
        
    ];
    
    public function fjadwalsurvey(){
        return $this->belongsTo(jadwalsurvey::class, 'id_jadwalsurvey', 'id');
        }

 // public function datacalonpelanggan()
    // {
    //     return $this->belongsTo(datacalonpelanggan::class, 'id_calon_pelanggan');
    // } 

    // public function fdatacalonpelanggan(){
    // return  $this->belongsTo(jadwalsurvey::class,  'id_datacekcoverage',  'id');

}