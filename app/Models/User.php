<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'divisi',
        'aktif',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->divisi === 'Admin'; // Misalkan 'admin' adalah nilai yang menunjukkan peran admin dalam tabel pengguna
    }

    // Method untuk memeriksa apakah pengguna adalah teknisi
    public function isTechnician()
    {
        return $this->divisi === 'Teknisi'; // Misalkan 'teknisi' adalah nilai yang menunjukkan peran teknisi dalam tabel pengguna
    }

    // Method untuk memeriksa apakah pengguna adalah noc
    public function isNoc()
    {
        return $this->divisi === 'NOC'; // Misalkan 'noc' adalah nilai yang menunjukkan peran noc dalam tabel pengguna
    }
}
