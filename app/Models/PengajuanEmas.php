<?php

namespace App\Models;

use App\Models\VersiProduk;
use App\Models\PerpanjanganEmas;
use App\Models\RincianPengajuanEmas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengajuanEmas extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_emas_syirkah';

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

    public function generate_no_mq($check)
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

    public function status()
    {
        if($this->status == 'Pengajuan'){
            return '<span class="badge badge-warning">'.$this->status.'</span>';
        } else if ($this->status == 'Approved'){
            return '<span class="badge badge-primary">'.$this->status.'</span>';
        } else if ($this->status == 'Non Aktif'){
            return '<span class="badge badge-danger">'.$this->status.'</span>';
        }
    }
    public function versi()
    {
        return $this->hasOne(VersiProduk::class,'id','versi_syirkah');
    }

    public function generate_no_sertifikat_mt($check, $pengajuan){
        if($check)
        {
            if($pengajuan->pilihan_program == "pokokWakaf"){
                $kode = substr($check->kode_sertifikat,8);
                $kode = substr_replace($kode,"",-1);
                $kode = (int)$kode+1;
                $today = date("dm");
                return "GTW-".$today.$kode."4";
            } else {
                $kode = substr($check->kode_sertifikat,8);
                $kode = substr_replace($kode,"",-1);
                $kode = (int)$kode+1;
                $today = date("dm");
                return "GTR-".$today.$kode."0";
            }
        } else {
            if($pengajuan->pilihan_program == "pokokWakaf"){
                $today = date("dm");
                return "GTW-".$today."3000001"."4";
            } else {
                $today = date("dm");
                return "GTR-".$today."3000001"."0";

            }
        }
    }
    public function generate_no_sertifikat_mq($check){
        if($check)
        {
            if($pengajuan->pilihan_program == "pokokWakaf"){
                $kode = substr($check->kode_sertifikat,8);
                $kode = substr_replace($kode,"",-1);
                $kode = (int)$kode+1;
                $today = date("dm");
                return "GQW-".$today.$kode."6";
            } else {
                $kode = substr($check->kode_sertifikat,8);
                $kode = substr_replace($kode,"",-1);
                $kode = (int)$kode+1;
                $today = date("dm");
                return "GQR-".$today.$kode."2";
            }
        } else {
            if($pengajuan->pilihan_program == "pokokWakaf"){
                $today = date("dm");
                return "GQW-".$today."3000001"."6";
            } else {
                $today = date("dm");
                return "GQR-".$today."3000001"."2";

            }
        }
    }
}
