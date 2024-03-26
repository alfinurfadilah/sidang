<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportsurvey extends Model
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
        'status',
        'id_jadwalsurvey',
        'id_teknisi',
        'id_site'
        
        
    ];
    
    public function fjadwalsurvey(){
        return $this->belongsTo(Jadwalsurvey::class, 'id_jadwalsurvey', 'id');
        }

    public function fsite(){
        return  $this->belongsTo(Site::class,  'id_site',  'id');
        }

    public function teknisis()
        {
            return $this->belongsToMany(Teknisi::class, 'reportsurvey_teknisi', 'id_reportsurvey', 'id_teknisi');
        }
        

 // public function datacalonpelanggan()
    // {
    //     return $this->belongsTo(datacalonpelanggan::class, 'id_calon_pelanggan');
    // } 

    // public function fdatacalonpelanggan(){
    // return  $this->belongsTo(jadwalsurvey::class,  'id_datacekcoverage',  'id');

}