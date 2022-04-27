<?php

namespace App\Models;

use App\Models\Usaha;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsahaImages extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','nama','lokasi_foto'];
    public function usaha()
    {
        return $this->belongsTo(Usaha::class);
    }
}
