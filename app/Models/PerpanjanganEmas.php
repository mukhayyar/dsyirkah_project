<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerpanjanganEmas extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'perpanjangan_emas_syirkah';
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    public function tgl_akad_baru()
    {
        return date_format(date_create($this->tgl_akad_baru),"Y-m-d");
    }
}
