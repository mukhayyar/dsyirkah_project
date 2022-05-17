<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanEmas extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_emas';

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
}
