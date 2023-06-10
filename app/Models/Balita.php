<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;
    protected $table = 'balita';
    protected $primaryKey = 'idbalita';
    public $timestamps = true;
    protected $fillable = ['id_ang_kk', 'nama_balita', 'bb', 'pb', 'kms', 'asi_eks'];

    public function anggkk()
    {
        return $this->belongsTo(Anggkk::class, 'id_ang_kk', 'id_ang_kk');
    }
    

    public function vitamin()
    {
        return $this->hasOne(Vitamin::class, 'idbalita');
    }

    // Relasi dengan model Timbang
    public function timbang()
    {
        return $this->hasMany(Timbang::class, 'idbalita')->onDelete('cascade');
    }


}
