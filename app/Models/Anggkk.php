<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggkk extends Model
{
    protected $table = 'anggkk';
    protected $primaryKey = 'id_ang_kk';
    public $timestamps = true;
    protected $fillable = ['idkk', 'nama', 'ttl', 'sex', 'hubungan', 'pekerjaan', 'pendidikan'];

    public function kk()
    {
        return $this->belongsTo(KK::class, 'idkk', 'idkk');
    }

    public function balitas()
    {
        return $this->hasMany(Balita::class, 'id_ang_kk', 'id_ang_kk');
    }
}
