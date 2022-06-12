<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NisbahVersiProduk extends Model
{
    use HasFactory;
    protected $table = 'nisbah_versi_produk_syirkah';
    protected $fillable = ['versi_id','bulan','nisbah'];
    public $timestamps = false;
}
