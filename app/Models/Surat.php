<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = "surat";

    protected $fillable = [
        'pengirim',
        'user_id',
        'nomor_surat',
        'tanggal_surat',
        'tanggal_diterima',
        'perihal',
        'asal_surat',
        'file_surat',
        'departemen',
        'tipe_surat' 
    ];

    protected $casts = [
        'tanggal_surat' => 'datetime',
        'tanggal_diterima' => 'datetime',
    ];

    public function scopeFilter($query, $searchTerm)
    {
        return $query->when($searchTerm, function ($query) use ($searchTerm) {
            $query->where('pengirim', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('asal_surat', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('nomor_surat', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('departemen', 'LIKE', '%' . $searchTerm . '%');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
