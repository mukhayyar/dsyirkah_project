<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonAktifRupiah extends Model
{
    protected $table = 'nonaktif_rupiah_syirkah';
    public $timestamps = false;
    use HasFactory;
    public function pengajuan()
    {
        return $this->belongsTo(PengajuanEmas::class,'pengajuan_id');
    }
    public function anggota()
    {
        return $this->belongsTo(Anggota::class,'anggota_id');
    }
}
