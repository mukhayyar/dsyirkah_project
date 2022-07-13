<?php

namespace App\Models;

use App\Models\Anggota;
use App\Models\PerpanjanganRupiah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengajuanRupiah extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_rupiah_syirkah';

    protected $fillable = ['status'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function perpanjangan_rupiah()
    {
        return $this->hasMany(PerpanjanganRupiah::class,'pengajuan_id');
    }

    public function generate_no_mq($check)
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
    public function jangka_waktu()
    {
        return $this->perpanjangan_rupiah()->orderBy("jatuh_tempo_akan_datang","desc")->where('status','Approved')->first()->jangka_waktu." Bulan";
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
                return "RTW-".$today.$kode."5";
            } else {
                $kode = substr($check->kode_sertifikat,8);
                $kode = substr_replace($kode,"",-1);
                $kode = (int)$kode+1;
                $today = date("dm");
                return "RTW-".$today.$kode."1";
            }
        } else {
            if($pengajuan->pilihan_program == "pokokWakaf"){
                $today = date("dm");
                return "RTW-".$today."3000001"."5";
            } else {
                $today = date("dm");
                return "RTR-".$today."3000001"."1";
            }
        }
    }
    public function generate_no_sertifikat_mq($check, $pengajuan){
        if($check)
        {
            if($pengajuan->pilihan_program == "pokokWakaf"){
                $kode = substr($check->kode_sertifikat,8);
                $kode = substr_replace($kode,"",-1);
                $kode = (int)$kode+1;
                $today = date("dm");
                return "RQW-".$today.$kode."7";
            } else {
                $kode = substr($check->kode_sertifikat,8);
                $kode = substr_replace($kode,"",-1);
                $kode = (int)$kode+1;
                $today = date("dm");
                return "RQR-".$today.$kode."3";
            }
        } else {
            if($pengajuan->pilihan_program == "pokokWakaf"){
                $today = date("dm");
                return "RQW-".$today."3000001"."7";
            } else {
                $today = date("dm");
                return "RQR-".$today."3000001"."3";
            }
        }
    }

}
