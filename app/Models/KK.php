<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KK extends Model
{
    use HasFactory;
    protected $table = 'kk';
    protected $primaryKey = 'idkk';
    public $timestamps = true;
    protected $fillable = ['namakk', 'TTL', 'sex', 'pekerjaan', 'pendidikan', 'alamat'];

    public function anggkks()
    {
        return $this->hasMany(Anggkk::class, 'idkk', 'idkk');
    }
}
