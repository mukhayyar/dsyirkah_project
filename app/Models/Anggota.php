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

    public function mask_email()
    {
        $em = explode("@",$this->email);
        $name = implode('@',array_slice($em, count($em)-1));
        $len = floor(strlen($name)/2);
        return substr($name,0, $len).str_repeat('*',$len).'@'.end($em);
    }

    public function mask_no_hp()
    {
        $number = "********".substr($this->no_hp,-4);
        return $number;
    }

    public function mask_nomor_ba()
    {
        $no_ba = "************".substr($this->nomor_ba,-4);
        return $no_ba;
    }

    public function latest_no_ba()
    {
        return $this->nomor_ba;
    }
}
