<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerpanjanganRupiah extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'perpanjangan_rupiah_syirkah';
    public $timestamps = false;
    protected $dates = ['deleted_at'];
}
