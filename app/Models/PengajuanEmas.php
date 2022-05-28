<?php

namespace App\Models;

use App\Models\PerpanjanganEmas;
use App\Models\RincianPengajuanEmas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengajuanEmas extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_emas';

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function rincian_pengajuan_emas()
    {
        return $this->hasMany(RincianPengajuanEmas::class,'pengajuan_id');
    }

    public function perpanjangan_emas()
    {
        return $this->hasMany(PerpanjanganEmas::class,'pengajuan_id');
    }

    public function generate_no_mq()
    {
        if($check)
        {
            $no = explode("-",$check->no_pengajuan);
            $no = $no[1];
            $le = strlen($no);
            return "G-".str_pad(++$no, $le, '0', STR_PAD_LEFT)."-MQ";
        } else {
            return "G-000001-MQ";
        }
    }
    public function generate_no_mt($check)
    {
        if($check)
        {
            $no = explode("-",$check->no_pengajuan);
            $no = $no[1];
            $le = strlen($no);
            return "G-".str_pad(++$no, $le, '0', STR_PAD_LEFT)."-MT";
        } else {
            return "G-000001-MT";
        }
    }

    public function total_gramasi()
    {
        return $this->total_gramasi." Gram";
    }

    public function jangka_waktu()
    {
        return $this->jangka_waktu." Bulan";
    }
}
