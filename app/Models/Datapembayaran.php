<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapembayaran extends Model
{
    
    use HasFactory;
    protected $table = 'datapembayaran';
    protected $fillable = [
        'id_pelanggan',
        'nama',
        'harga_paket',
        'payment_status',
        'bulan',
        'tahun',
        'id_paket'
        
    ];

    public function fpaket(){
        return  $this->belongsTo(Paket::class,  'id_paket',  'id');
        }
    
    }