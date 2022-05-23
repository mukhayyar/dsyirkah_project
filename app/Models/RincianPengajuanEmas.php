<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianPengajuanEmas extends Model
{
    use HasFactory;
    protected $table = 'rincian_pengajuan_emas';
    public $timestamps = false;
    public function jumlah()
    {
        return $this->jumlah." Gram";
    }
}
