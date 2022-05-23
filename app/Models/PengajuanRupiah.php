<?php

namespace App\Models;

use App\Models\Anggota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengajuanRupiah extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_rupiah';

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function generate_no_mq()
    {
        if($check)
        {
            $no = explode("-",$check->no_pengajuan);
            $no = $no[1];
            $le = strlen($no);
            return "R-".str_pad(++$no, $le, '0', STR_PAD_LEFT)."-MQ";
        } else {
            return "R-000001-MQ";
        }
    }
    public function generate_no_mt($check)
    {
        if($check)
        {
            $no = explode("-",$check->no_pengajuan);
            $no = $no[1];
            $le = strlen($no);
            return "R-".str_pad(++$no, $le, '0', STR_PAD_LEFT)."-MT";
        } else {
            return "R-000001-MT";
        }
    }
    public function nominal()
    {
        return "Rp. ".number_format($this->nominal,0,",",".").",-";
    }
}
