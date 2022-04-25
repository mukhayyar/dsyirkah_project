<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','nama_karyawan','email','user_name','jabatan','kantor','status'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
