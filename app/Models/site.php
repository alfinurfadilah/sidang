<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class site extends Model
{
    use HasFactory;
    protected $table = 'site';
    protected $fillable = [
        'site',
        'alamat_site',
    ];

    public function reportsurvey()
    {
        return $this->hasOne(reportsurvey::class, 'id_site');
    }
}
