<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $fillable = ['nomor_ba','nama_lengkap','no_hp','email'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
