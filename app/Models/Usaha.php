<?php

namespace App\Models;

use App\Models\UsahaImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usaha extends Model
{
    use HasFactory;
    protected $table = 'usaha_syirkah';
    public function usahaImages()
    {
        return $this->hasOne(UsahaImages::class);
    }
    public function checkUsahaKebutuhan()
    {
        if(is_null($this->kebutuhan_emas))
        {
            return true;
        } 
        return false;
    }

    public function jangkaWaktu()
    {
        return $this->jangka_waktu." Bulan";
    }

    public function capaian_percent()
    {
        if($this->kebutuhan_rupiah){
            return ($this->capaian_muqayyadah/$this->kebutuhan_rupiah)*100;
        }
        return ($this->capaian_muqayyadah/$this->kebutuhan_emas)*100;
    }
}
