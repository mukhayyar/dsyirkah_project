<?php

namespace App\Models;

use App\Models\NisbahVersiProduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VersiProduk extends Model
{
    use HasFactory;
    protected $table = 'versi_produk_syirkah';
    public $timestamps = false;

    public function nisbah_versi_produk_syirkah()
    {
        return $this->hasMany(NisbahVersiProduk::class,'versi_id');
    }
}
