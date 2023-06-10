<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemulihan extends Model
{
    use HasFactory;
    protected $table = 'pemulihan';
    protected $primaryKey = 'idpulih';
    public $timestamps = true;

    protected $fillable = [
        'idtimb',
        'idlacak',
        'tgl_konsumsi_awal',
        'tgl_konsumsi_akhir',
    ];

    public function timbang()
    {
        return $this->belongsTo(Timbang::class, 'idtimb');
    }

    public function lacak()
    {
        return $this->belongsTo(Lacak::class, 'idtimb');
    }
}
