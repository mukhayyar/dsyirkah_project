<?php

namespace App\Models;

use App\Models\UsahaImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usaha extends Model
{
    use HasFactory;
    protected $table = 'usaha';
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
}
