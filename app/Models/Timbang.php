<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timbang extends Model
{
    use HasFactory;
    protected $table = 'timbang';

    protected $primaryKey = 'idtimb';

    protected $fillable = [
        'idbalita',
        'tgl_timbang',
        'tempat',
        'bb',
        'tb',
        'status_gizi',
        'petugas',
    ];

    public function balita()
    {
        return $this->belongsTo(Balita::class, 'idbalita');
    }
    public function pmt()
    {
        return $this->hasOne(PMT::class, 'idtimb');
    }

    public function lacak()
    {
        return $this->hasMany(Lacak::class, 'idtimb');
    }

}
