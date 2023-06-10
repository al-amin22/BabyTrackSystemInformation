<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMT extends Model
{
    use HasFactory;
    protected $table = 'pmt';
    protected $primaryKey = 'idpmt';
    protected $fillable = ['idtimb', 'tgl_pemberianTMT', 'jenis_PMT'];

    public function timbang()
    {
        return $this->belongsTo(Timbang::class, 'idtimb');
    
    }
}
