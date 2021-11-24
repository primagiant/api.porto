<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;
    protected $table = "tb_portofolio";
    protected $fillable = [
        'mahasiswa_nim',
        'kategori_kegiatan_id',
        'jenis_kegiatan_id',
        'valid_point',
        'nama_kegiatan',
        'penyelenggara',
        'tahun',
        'bukti',
        'status',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_nim', 'nim');
    }

    public function kategori_kegiatan()
    {
        return $this->belongsTo(KategoriKegiatan::class, 'kategori_kegiatan_id', 'id');
    }

    public function jenis_kegiatan()
    {
        return $this->belongsTo(JenisKegiatan::class, 'jenis_kegiatan_id', 'id');
    }
}
