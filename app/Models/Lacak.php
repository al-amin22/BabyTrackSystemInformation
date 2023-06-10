<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lacak extends Model
{
    use HasFactory;
    protected $table = 'lacak';
    protected $primaryKey = 'idlacak';
    public $timestamps = true;

    protected $fillable = [
        'idtimb',
        'tgl_lacak',
        'peny_penyerta',
    ];

    public function timbang()
    {
        return $this->belongsTo(Timbang::class, 'idtimb');
    }

    public function pemulihan()
    {
        return $this->hasOne(Pemulihan::class, 'idlacak');
    }

}
